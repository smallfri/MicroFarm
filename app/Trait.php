<?php namespace App\Traits;

use Carbon\Carbon;

trait BaseModelTrait
{

    protected $attrs_json = null;

    /**
     * @description
     *
     * @param        $name
     * @param        $type
     * @param string $default_value
     *
     * @return string
     */
    public function format($name, $type = 'string', $default_value = '&nbsp;', $strict = false)
    {
        $formatted = $default_value;
        //if strict then if model value empty will use the default value.
        if (isset($this->$name)) {
            if ($strict === true && !empty($this->$name)) {
                $formatted = $this->$name;
            } elseif ($strict === false) {
                $formatted = $this->$name;
            }
        }
        switch ($type) {
            case "ucwords":
                $formatted = ucwords($formatted);
                break;
            case "ucfirst":
            case "ucFirstLetter":
                $formatted = ucfirst($formatted);
                break;
            case "phone":
                $cleaned = preg_replace('/[^[:digit:]]/', '', $formatted);
                $cleaned = ltrim($cleaned, '1');
                if (strlen($cleaned) < 9) {
                    //no need to do anything. non standard phone number
                } else {
                    preg_match('/(\d{3})(\d{3})(\d{4})(\d+)?/', $cleaned, $matches);
                    $formatted = "({$matches[1]}) {$matches[2]}-{$matches[3]}";
                    if (!empty($matches['4'])) {
                        $formatted .= " ext {$matches['4']}";
                    }
                }
                break;
            case 'ssn':
                if (strlen($formatted) > 4) {
                    $formatted = substr($formatted, -4);
                }
                break;
            case 'date':
                $formatted = $this->_date($formatted, 'M, d Y');
                break;
            case 'datetime':
                $formatted = $this->_date($formatted, 'M, d Y G:i:s');
                break;
            case "ago":
                $your_date = $this->_date($formatted, 'Y-m-d');
                $your_date = strtotime($your_date);
                $now       = time(); // or your date as well
                $datediff  = $now - $your_date;
                $formatted = floor($datediff / (60 * 60 * 24));
                break;
            default:
                if (preg_match('/maxchar:(\d+)/', $type, $max_matches)) {
                    list($found, $maxChars) = $max_matches;
                    if (strlen($formatted) > $maxChars) {
                        $formatted = substr($formatted, 1, $maxChars) . " . . . ";
                    }
                }
        }

        return $formatted;
    }

    /**
     * Get the date.
     *
     * @param \Carbon|null $date
     * @param string $default
     *
     * @return string
     */
    public function _date($date = null, $format = null, $default = 'Not a valid date')
    {
        if (is_null($date)) {
            $date = $this->created_at;
        }
        if (preg_match('/((start|end)_?date)/', $date, $matches)) {
            $date = $this->$matches[0];
        }
        $test = date('Y', strtotime($date . ""));
        if ($test < 1960) {
            return $default;
        }
        if (is_string($date)) {
            $date = Carbon::instance(new \DateTime($date));
        }
        if (!is_null($format)) {
            return $date->format($format);
        }

        return $date->toFormattedDateString();
    }

    /**
     * Returns the created_at date,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->_date($this->created_at);
    }

    /**
     * Returns the updated_at date,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->_date($this->updated_at);
    }

    /**
     * @description
     * @author info@turtlebytes.com
     * @return bool
     */
    public function coalesce()
    {
        $args = func_get_args();
        for ($i = 0; $i < count($args); $i++) {
            if (isset($this->$args[$i])) {
                return $this->$args[$i];
            }
        }

        return false;
    }

    /**
     * set the attributes value for speed then
     *
     * @param        $attr_name
     * @param string $column_name name of json column where attrs are stored
     *
     * @return bool
     */
    protected function getAttrs($attr_name, $column_name = null)
    {
        if (is_null($column_name)) {
            if (isset($this->attrs_json) && !is_null($this->attrs_json)) {
                $column_name = $this->attrs_json;
            } else {
                $column_name = 'attrs_json';
            }
        }

        //no attr exists
        if (empty($this->attributes[$column_name]) || !isset($this->attributes[$column_name])) {
            return false;
        }

        $attr = json_decode($this->attributes[$column_name], true);

        if (!isset($attr[$attr_name])) {
            $this->attributes[$attr_name] = null;

            return false;
        }

        $this->attributes[$attr_name] = $attr[$attr_name];

        return $attr[$attr_name];
    }

    /**
     * update the attributes and attrs_json objects
     *
     * @param        $name
     * @param        $value
     * @param string $column_name name of json column where attrs are stored
     */
    protected function setAttrs($name, $value, $column_name = null)
    {
        if (is_null($column_name)) {
            if (isset($this->attrs_json) && !is_null($this->attrs_json)) {
                $column_name = $this->attrs_json;
            } else {
                $column_name = 'attrs_json';
            }
        }

        if (isset($this->attributes[$name])) {
            unset($this->attributes[$name]);
        }
        if (!isset($this->attributes[$column_name])) {
            $this->attributes[$column_name] = json_encode([]);
        }

        $tmpAttrs                       = (array)json_decode($this->attributes[$column_name]);
        $tmpAttrs[$name]                = $value;
        $this->attributes[$column_name] = json_encode($tmpAttrs);
    }
}