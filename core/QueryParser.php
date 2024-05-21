<?php
class QueryParser
{
    public function matches($document, $query)
    {
        // simple query parser implementation
        // supports equality, greater than, and less than operators
        foreach ($query as $field => $value) {
            if (!isset($document[$field])) {
                return false;
            }
            switch ($value[0]) {
                case '=':
                    if ($document[$field] != $value[1]) {
                        return false;
                    }
                    break;
                case '>':
                    if ($document[$field] <= $value[1]) {
                        return false;
                    }
                    break;
                case '<':
                    if ($document[$field] >= $value[1]) {
                        return false;
                    }
                    break;
            }
        }
        return true;
    }
}
