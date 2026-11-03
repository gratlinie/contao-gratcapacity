# GratCapacity

Frontend-Modul „Auslastung“ für Contao 5.7: zeigt die aktuelle Auslastung auf einer Skala von 1 bis 10 als
Balken (zehn Segmente) oder Batterie – kompakt als Plakette oder als Karte mit Prozentwert.

## Einrichtung

```bash
composer require gratlinie/contao-gratcapacity
vendor/bin/contao-console contao:migrate
```

Layout → Themes → Module → neues Modul vom Typ **Auslastung** (Kategorie Verschiedenes), eingebunden z. B. per
Inhaltselement „Modul“.

| Feld | Wirkung |
|---|---|
| Auslastung | 1–10; 1–4 „Freie Slots verfügbar“ (grün), 5–8 „Wenige Slots verfügbar“ (gelb), 9–10 „Keine freien Slots verfügbar“ (rot) |
| Anzeige | Balken oder Batterie |
| Größe | Kompakt (einzeilige Plakette) oder Karte (mit Prozentwert) |
| Animation, Tempo | Lichtwelle an/aus (Standard: an), langsam / normal / schnell |
| Überschrift, Texte | leer = „Aktuelle Auslastung“ bzw. die Standardtexte je Stufe |

Das Stylesheet `bundles/gratliniegratcapacity/css/capacity.css` lädt das Modul selbst. Es nutzt GratFrame-Variablen,
wenn vorhanden (`--gf-color-bg`, `--gf-radius`, `--gf-fs-*`), und läuft auch ohne GratFrame.

Variablen: `--gc-color-free`, `--gc-color-few`, `--gc-color-none`, `--gc-bg`, `--gc-border`, `--gc-blur`,
`--gc-radius`, `--gc-segment-width`, `--gc-segment-height`, `--gc-glow`, `--gc-glow-strong`. Durch die gefüllten Segmente
läuft in Schleife eine Lichtwelle (bei der Batterie ein Lichtstreifen), Tempo über `--gc-wave-duration` und
`--gc-wave-step`; bei reduzierter Bewegung steht sie still. Der Balken ist ein `role="meter"` mit `aria-valuenow`.

## Lizenz

MIT, siehe [LICENSE](LICENSE).
