<?php

/*
 * Copyright 2013 kelsoncm <falecom@kelsoncm.com>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Description of DateType
 *
 * @author kelsoncm <falecom@kelsoncm.com>
 */
class DateType extends DateTimeType {
    
    protected $typeprefix = 'datetype';

    public function toPrimitiveType($value) {
        $value2 = parent::toPrimitiveType($value);
        if (is_null($value2) || $value2 instanceof DateTime) {
            return $value2;
        }
        if (is_string($value)) {
            return DateTime::createFromFormat($this->getOption('fromformat'), $value, $this->getDateTimeZone());
        } else if ( is_array($value) ) {
            return DateTime::createFromFormat("Y-m-d", "{$value['year']}-{$value['mon']}-{$value['mday']}", $this->getDateTimeZone());
        }
        throw new Exception("Invalid date.");
    }

}
