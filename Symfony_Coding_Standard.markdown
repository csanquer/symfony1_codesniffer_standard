Symfony Coding Standards
========================

The golden rule: Imitate the existing symfony code

* Never use tabulations in the code. Indentation is done by steps of  4 blanks. For yml files 2 blanks should be used.
* Don't put spaces after an opening parenthesis and before a closing one.

        if ($reqvalue == _getRequestValue($name))    correct
        if ( $reqvalue == _getRequestValue($name) )  incorrect
    
* Use camelCase, not underscores, for variable, function and method names.
* Use underscores for helper functions name (only for symfony 1.0 stuff).
* Use underscores for option/argument/parameter names.
* Braces always go on their own line.
* Use braces for indicating control structure body regardless of number of statements it contains.
* Don't end library files with the usual ?> closing tag. This is because it is not really needed, and because it can create problems in the output if you ever have white space after this tag.
* In a function body, return statements should have a blank line prior to it to increase readability.

        function fooFunction()
        {
          if (condition2 || condition3)
          {
            statement1;
            statement2;

            return 1;
          }
          else
          {
            defaultaction;
          }

          return null;
        }
      
* All one line comments should be on their own lines and in this format.

        // space first, with no full stop needed
    
* Avoid evaluating variables within strings, instead opt for concatenation es and string with a lot of substitution

        $string = 'something';
        $newString = "$string is awesome!";    // bad, not awesome
        $newString = $string.' is awesome!';   // better
        $newString = sprintf('%s is awesome', $string); // for exception messages and string with a lot of substitution
        
* Use lowercase constants: false, true, null
* To check if a variable is null or not, use the is_null() function
* When comparing a variable to a string, put the string first:

        if (1 == $variable)
        
* A phpdoc block begins with a single line ending with a point. All @... statements does not end with a dot:

        /**
          * Notifies all listeners of a given event.
          *
          * @param sfEvent A sfEvent instance
          *
          * @return sfEvent The sfEvent instance
          */
