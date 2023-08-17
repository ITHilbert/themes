# Themes

Stellt funktionen zur erstellung von Themes zur verfügung.

---
## Menü
- [Installation](#installation)
- [config/app.php](#config/app.php)
- [Config File kopieren](#config-file-kopieren)
- [layouts.root @yield Bereiche](#layoutsroot-yield-bereiche)
- [layouts.basic @yield Bereiche](#layoutsbasic-yield-bereiche)
- [layouts.app @yield Bereiche](#layoutsapp-yield-bereiche)
- [layouts.card @yield Bereiche](#layoutscard-yield-bereiche)
- [Author](#author)

---

## Installation
```
xxx
```


### config/app.php
Den Punkt Providers um folgenden Eintrag ergänzen:
```
\ITHilbert\Themes\ThemesServiceProvider::class,
```


## layouts.root @yield Bereiche:

1. **@yield('head_start')**
   - Beschreibung: Platziert zusätzliche Inhalte am Anfang des `<head>` Tags. Nützlich für zusätzliche Meta-Tags, Styles oder andere Ressourcen.

2. **@yield('meta_start')**
   - Beschreibung: Platziert zusätzliche Meta-Tags am Anfang der Meta-Bereichsliste.

3. **@yield('meta_description')**
   - Beschreibung: Für die Angabe der Meta-Beschreibung der Webseite.

4. **@yield('meta_keywords')**
   - Beschreibung: Für die Angabe der Meta-Keywords der Webseite.

5. **@yield('meta_robots')**
   - Beschreibung: Für die Angabe von Meta-Robots-Regeln. Standardmäßig auf "index, follow" gesetzt.

6. **@yield('meta')**
   - Beschreibung: Für die Hinzufügung zusätzlicher Meta-Tags.

7. **@yield('meta_end')**
   - Beschreibung: Platz für zusätzliche Meta-Tags am Ende der Meta-Bereichsliste.

8. **@yield('title')**
   - Beschreibung: Für den Seitentitel.

9. **@yield('favicons')**
   - Beschreibung: Zum Hinzufügen oder Überschreiben von Favicon-Links.

10. **@yield('head_js')**
   - Beschreibung: Zum Einbinden von JavaScript-Ressourcen im Kopfbereich.

11. **@yield('css_start')**
   - Beschreibung: Zum Einbinden von zusätzlichen Stylesheets vor den Standard-Styles.

12. **@yield('css')**
   - Beschreibung: Zum Einbinden von zusätzlichen Stylesheets nach den Standard-Styles.

13. **@yield('css_end')**
   - Beschreibung: Platz für zusätzliche Stylesheets am Ende der Stylesheet-Liste.

14. **@yield('schemaorg')**
   - Beschreibung: Zum Hinzufügen von Schema.org Markup.

15. **@yield('head_end')**
   - Beschreibung: Platz für zusätzlichen Code am Ende des `<head>` Tags.

16. **@yield('classes_body')**
   - Beschreibung: Zum Hinzufügen von zusätzlichen CSS-Klassen zum `<body>` Tag.

17. **@yield('body_data')**
   - Beschreibung: Zum Hinzufügen von Datenattributen zum `<body>` Tag.

18. **@yield('body_start')**
   - Beschreibung: Platz für zusätzlichen Code am Anfang des `<body>` Tags.

19. **@yield('main')**
   - Beschreibung: Hauptinhalt der Webseite.

20. **@yield('js_start')**
   - Beschreibung: Zum Einbinden von JavaScript-Ressourcen vor den Standard-Scripts.

21. **@yield('js')**
   - Beschreibung: Zum Einbinden von zusätzlichen JavaScript-Dateien.

22. **@yield('js_end')**
   - Beschreibung: Platz für zusätzlichen JavaScript-Code am Ende der Skriptliste.

23. **@yield('body_end')**
   - Beschreibung: Platz für zusätzlichen Code am Ende des `<body>` Tags.

## layouts.basic @yield Bereiche:
extends **layouts.root**

Befüllt **@yield('main')**

**Neue bereiche:**

1. **@yield('sidebar')**
   - Beschreibung: Platz für die Seitenleiste des Layouts. Hier können Sie beispielsweise Navigationslinks oder Widgets platzieren.

2. **@yield('header')**
   - Beschreibung: Platz für den Kopfbereich oder die Kopfzeile des Layouts. Oft verwendet für Dinge wie Webseiten-Logos oder Hauptnavigation.

3. **@yield('content')**
   - Beschreibung: Der Hauptinhalt der Seite. Dies ist der Hauptbereich, in den der spezifische Inhalt der jeweiligen Seite eingefügt wird.

4. **@yield('footer')**
   - Beschreibung: Platz für den Fußzeileninhalt des Layouts. Hier können Sie beispielsweise Copyright-Informationen, Links zu Datenschutzrichtlinien oder andere wichtige Links für Ihre Website platzieren.

## layouts.app @yield Bereiche:
extends **layouts.basic**

Befüllt die bereiche **@yield('header')**, **@yield('sidebar')** und **@yield('footer')**.

## layouts.card @yield Bereiche:
extends **layouts.app**

Befüllt **@yield('content')** mit einer Card.

**Neue Bereiche:**

1. **@yield('before-card')**
   - Beschreibung: Platz für Inhalte oder Elemente, die vor der Hauptkarte platziert werden sollen.

2. **@yield('card-start')**
   - Beschreibung: Ein Abschnitt am Anfang des Hauptkarten-Elements.

3. **@yield('title')**
   - Beschreibung: Standardtitel für die Karte, wird nur angezeigt, wenn kein spezifischer `card-header` Abschnitt definiert ist.

4. **@yield('card-header')**
   - Beschreibung: Kopfbereich der Karte. Hier können Sie benutzerdefinierte Überschriften oder andere Elemente für den Kartenkopf einfügen.

5. **@yield('before-card-body')**
   - Beschreibung: Ein Bereich direkt vor dem Hauptinhalt der Karte.

6. **@yield('card-body')**
   - Beschreibung: Der Hauptinhalt der Karte. Hier wird der spezifische Inhalt der jeweiligen Seite eingefügt, zusammen mit etwaigen Meldungen.

7. **@yield('after-card-body')**
   - Beschreibung: Ein Bereich direkt nach dem Hauptinhalt der Karte.

8. **@yield('card-footer')**
   - Beschreibung: Der Fußbereich der Karte. Nur sichtbar, wenn dieser Abschnitt explizit in der Seite definiert ist.

9. **@yield('card-ende')**
   - Beschreibung: Ein Abschnitt am Ende des Hauptkarten-Elements.

10. **@yield('after-card')**
   - Beschreibung: Platz für Inhalte oder Elemente, die nach der Hauptkarte platziert werden sollen.




## Author
IT-Hilbert GmbH

Access, Excel, VBA und Web Programmierungen

Homepage: [IT-Hilbert.com](https://www.IT-Hilbert.com) 
