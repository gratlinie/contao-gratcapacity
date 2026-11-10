# Changelog

## 0.2.0 (2026-11-10)

- Neue Variable `--gc-offset-inline`: rückt die Plakette nach links aus, damit ihr Text optisch bündig mit dem Text darunter steht (z. B. `calc(-1em - 1px)`)
- Neue Größe **Statuspunkt**: leuchtender, pulsierender Punkt mit Statustext für die Kopfzeile; die Überschrift steht als Tooltip und für Screenreader bereit, unter 36rem bleibt nur der Punkt sichtbar

## 0.1.0 (2026-11-03)

- Frontend-Modul **Auslastung**: Stufe 1–10, Status mit Text und Farbe (frei / wenige / keine freien Slots),
  Anzeige als Balken oder Batterie, kompakt oder als Karte; Glas-Optik mit leuchtenden Segmenten und
  Lichtwelle in Schleife, im Modul abschaltbar, Tempo langsam/normal/schnell (`--gc-wave-*`), Variablen `--gc-*`
- Lizenz MIT
