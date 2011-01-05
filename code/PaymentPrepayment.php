<?php
/**
 * Vorkasse Zahlungsmodul
 *
 * @package fashionbids
 * @author Sascha Koehler <skoehler@pixeltricks.de>
 * @copyright 2011 pixeltricks GmbH
 * @since 05.01.2011
 * @license none
 */
class PaymentPrepayment extends PaymentMethod {

    /**
     * Definition der Datenbankfelder.
     *
     * @var array
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public static $db = array(
    );

    /**
     * Definition der Labels fuer die Datenbankfelder.
     *
     * @var array
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public static $field_labels = array(
    );

    /**
     * Definiert die 1:1 Beziehungen der Klasse.
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public static $has_one = array(
        'HandlingCost' => 'HandlingCostPrepayment'
    );

    /**
     * Enthaelt den Modulname zur Anzeige in der Adminoberflaeche.
     *
     * @var string
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    protected $moduleName = 'Vorkasse';

    /**
     * Liefert die Eingabefelder zum Bearbeiten des Datensatzes.
     *
     * @param mixed $params Optionale Parameter
     *
     * @return FieldSet
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public function getCMSFields_forPopup($params = null) {
        $fields         = parent::getCMSFields_forPopup($params);
        $fieldLabels    = self::$field_labels;

        return $fields;
    }

    // ------------------------------------------------------------------------
    // Verarbeitungsmethoden
    // ------------------------------------------------------------------------
    
    /**
     * Bietet die Moeglichkeit, Code nach dem Anlegen der Bestellung
     * auszufuehren.
     *
     * @param Order $orderObj Das Order-Objekt, mit dessen Daten die Abwicklung
     * erfolgen soll.
     *
     * @return void
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public function processPaymentAfterOrder($orderObj) {
        parent::processPaymentAfterOrder($orderObj);
    }

    /**
     * Bietet die Moeglichkeit, Code vor dem Anlegen der Bestellung
     * auszufuehren.
     *
     * Holt sich das Paypal-Token und speichert es in der Session.
     * Anschliessend wird zum Checkout auf Paypal weitergeleitet.
     *
     * @return void
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public function processPaymentBeforeOrder() {
        parent::processPaymentBeforeOrder();
    }
    
    /**
     * Bietet die Moeglichkeit, Code nach dem Ruecksprung vom Payment
     * Provider auszufuehren.
     * Diese Methode wird vor dem Anlegen der Bestellung durchgefuehrt.
     *
     * Von Paypal wird in diesem Schritt die PayerId gesendet, die wir hier
     * in der Session speichern.
     * Anschliessend wird zum naechsten Schritt der Checkoutreihe
     * weitergeleitet.
     *
     * @return void
     *
     * @author Sascha Koehler <skoehler@pixeltricks.de>
     * @copyright 2011 pixeltricks GmbH
     * @since 05.01.2011
     */
    public function processReturnJumpFromPaymentProvider() {
        parent::processReturnJumpFromPaymentProvider();
    }

    // -----------------------------------------------------------------------
    // Methoden, die nur fuer das Vorkasse-Modul von Belang sind.
    // -----------------------------------------------------------------------
}