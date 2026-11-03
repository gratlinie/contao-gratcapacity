<?php

declare(strict_types=1);

namespace Gratlinie\GratCapacityBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Auslastung auf einer Skala von 1 bis 10 als Balken oder Batterie. Der Status
 * ergibt sich aus der Stufe: 1–4 freie Slots, 5–8 wenige Slots, 9–10 keine freien Slots.
 */
#[AsFrontendModule('gc_capacity', category: 'miscellaneous')]
class CapacityController extends AbstractFrontendModuleController
{
    public function __construct(private readonly TranslatorInterface $translator)
    {
    }

    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        $level = max(1, min(10, (int) $model->gcLevel ?: 5));
        $status = match (true) {
            $level <= 4 => 'free',
            $level <= 8 => 'few',
            default => 'none',
        };

        $texts = ['free' => $model->gcTextFree, 'few' => $model->gcTextFew, 'none' => $model->gcTextNone];
        $trans = fn (string $key): string => $this->translator->trans('MSC.gc_'.$key, [], 'contao_default');

        $template->set('gc_level', $level);
        $template->set('gc_status', $status);
        $template->set('gc_label', $model->gcLabel ?: $trans('label'));
        $template->set('gc_text', $texts[$status] ?: $trans($status));
        $template->set('gc_style', 'battery' === $model->gcStyle ? 'battery' : 'bar');
        $template->set('gc_size', 'card' === $model->gcSize ? 'card' : 'compact');
        $template->set('gc_animation', (bool) $model->gcAnimation);
        $template->set('gc_speed', \in_array($model->gcSpeed, ['slow', 'fast'], true) ? $model->gcSpeed : 'normal');
        $template->set('gc_css_version', substr(md5((string) filemtime(\dirname(__DIR__, 3).'/public/css/capacity.css')), 0, 8));

        return $template->getResponse();
    }
}
