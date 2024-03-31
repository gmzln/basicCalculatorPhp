# Hilfe!!!

## Irgendetwas stimmt mit unserem Taschenrechner nicht mehr?!

Seit gestern kann ich unseren Taschenrechner nicht mehr verwenden.

Er liefert keine Ergebnisse mehr aus.
Nach Rücksprache mit der IT funktioniert auch der Unit-Test nicht mehr.

Als die IT den Test mittels: <code>./vendor/bin/phpunit tests</code> im Projekt-Verzeichnis ausführte, kam unter Anderem folgender Fehler:

<code>
There were 2 errors:

1. Azubi\tests\Math\MathTest::testAdd
   TypeError: Typed property Azubi\tests\Math\MathTest::$sut must be an instance of Azubi\Math\MathInterface or null, Azubi\Math\Math used
   </code>

Des Weiteren hatte die IT den Verdacht, dass der Unit-Test nicht mehr vollständig ist.

### ToDo:

1. prüfen weshalb der Unit-Test nicht mehr funktioniert // DONE
   - downloaded composer
   - composer install
   - composer.json
     - delete name
     - php version to 8.3.4 (version that is used on current device)
2. Unit-Test reparieren // DONE
   - unit-test type fixing
   - problem Math class does not implement the MathInterface
   - Math Class needs to have the methods specified in MathInterface
     > class Math implements MathInterface
3. Unit-Test vervollständigen // DONE
   - added divide and multiply function test
   - in total 12 tests
   - run $ ./vendor/bin/phpunit --verbose tests to test > outcome 4 tests, 12 assertions > checked
4. WICHTIG!!! dafür sorgen, dass der Taschenrechner wieder die richtigen Ergebnisse liefert // DONE
   - imported Math Class and autoloading
   - run 'composer dump-autoload'
   - show result

#### nice to have:

- Composer Autoloading verwenden (PSR-4) // done
- Bitte das Layout wieder etwas moderner gestalten.
- Unit-Tests via composer ausführbar machen //done ?

### Tips:

#### Composer

Composer ist eine Paketverwaltungssoftware für PHP.  
In der **_composer.json_** Datei werden die Pakete definiert, welche für das aktuelle Projekt benötigt werden.

Durch den Befehl <code>composer install</code> werden dem Projekt alle nötigen Pakete hinzugefügt.  
Die Eingabe von <code>composer require **PAKET_NAME**</code> wird dem Projekt beispielsweise das Paket **PAKET_NAME** und dessen Abhängigkeiten hinzufügen.

Näheres dazu unter: [getcomposer.org](https://getcomposer.org/)
