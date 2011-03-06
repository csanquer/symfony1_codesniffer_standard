<?php
if (class_exists('PHP_CodeSniffer_Standards_AbstractVariableSniff', true) === false) {
    $error = 'Class PHP_CodeSniffer_Standards_AbstractVariableSniff not found';
    throw new PHP_CodeSniffer_Exception($error);
}

/**
 * Checks the naming of member variables.
 *
 */
class Symfony1_Sniffs_NamingConventions_ValidVariableNameSniff extends PHP_CodeSniffer_Standards_AbstractVariableSniff
{


    /**
     * Processes class member variables.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    protected function processMemberVar(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $memberName     = ltrim($tokens[$stackPtr]['content'], '$');
        $memberProps    = $phpcsFile->getMemberProperties($stackPtr);
        $isPublic       = ($memberProps['scope'] === 'private') ? false : true;
        $scope          = $memberProps['scope'];
        $scopeSpecified = $memberProps['scope_specified'];

        // If it's a private member, it must have an underscore on the front.
        if ($isPublic === false && $memberName{0} === '_') {
            $error = "Private member variable \"$memberName\" must not be prefixed with an underscore";
            $phpcsFile->addError($error, $stackPtr);
            return;
        }

        // If it's not a private member, it must not have an underscore on the front.
        if ($isPublic === true && $scopeSpecified === true && $memberName{0} === '_') {
            $error = ucfirst($scope)." member variable \"$memberName\" must not be prefixed with an underscore";
            $phpcsFile->addError($error, $stackPtr);
            return;
        }
        
        if (PHP_CodeSniffer::isCamelCaps($memberName) === false)
        {
            $error = "Member variable name \"$memberName\" is not in camel caps format";
            $phpcsFile->addError($error, $stackPtr);
            return;
        }
            

    }//end processMemberVar()


    /**
     * Processes normal variables.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where this token was found.
     * @param int                  $stackPtr  The position where the token was found.
     *
     * @return void
     */
    protected function processVariable(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        // We don't care about normal variables.
        return;

    }//end processVariable()


    /**
     * Processes variables in double quoted strings.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where this token was found.
     * @param int                  $stackPtr  The position where the token was found.
     *
     * @return void
     */
    protected function processVariableInString(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        // We don't care about normal variables.
        return;

    }//end processVariableInString()


}//end class

?>
