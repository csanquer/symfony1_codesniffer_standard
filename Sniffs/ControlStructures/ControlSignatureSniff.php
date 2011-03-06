<?php

if (class_exists('PHP_CodeSniffer_Standards_AbstractPatternSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_AbstractPatternSniff not found');
}

/**
 * Verifies that control statements conform to their coding standards.
 *
 */
class Symfony1_Sniffs_ControlStructures_ControlSignatureSniff extends PHP_CodeSniffer_Standards_AbstractPatternSniff
{


    /**
     * Constructs a Symfony_Sniffs_ControlStructures_ControlSignatureSniff.
     */
    public function __construct()
    {
        parent::__construct(true);

    }//end __construct()


    /**
     * Returns the patterns that this test wishes to verify.
     *
     * @return array(string)
     */
    protected function getPatterns()
    {
        return array(
                'doEOL',
                '} while (...);EOL',
                'while (...)EOL',
                'for (...)EOL',
                'if (...)EOL',
                'foreach (...)EOL',
                'else if (...)EOL',
                'elseif (...)EOL',
                'elseEOL',
               );

    }//end getPatterns()


}//end class

?>
