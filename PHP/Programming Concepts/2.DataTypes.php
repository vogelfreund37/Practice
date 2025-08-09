<?php 
// Data Type Validator

// INT
TypeOf(10);
// Float
TypeOf(13.37);
// Str
TypeOf("Some text");
// Bool
TypeOf(true);


function TypeOf($input) {
    switch (gettype($input)) {
        case 'integer':
            echo "The input is an Integer" . "\n";
            break;
        case 'double':
            echo "The input is a Float" . "\n";
            break;
        case 'string':
            echo "The input is a String" . "\n";
            break;
        case 'boolean':
            echo "The input is a Boolean" . "\n";
            break;
        default:
            echo "The input is of unknown type?";
            break;
    }
}
