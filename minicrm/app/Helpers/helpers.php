<?php

class Helpers 
{
    public static function url($path) {
        return BASE_URL . $path;
    }

    public static function displayNotification(){
        if (!isset($_SESSION['notification'])) {
            return;
        }

        foreach ($_SESSION['notification'] as $notif) {

            $type = $notif['type'];
            $message = $notif['message'];

            $color = match($type){
                'success' => 'bg-green-100 text-green-800 border-green-300',
                'error' => 'bg-red-100 text-red-800 border-red-300',
                'info' => 'bg-blue-100 text-blue-800 border-blue-300',
                default => 'bg-gray-100 text-gray-800 border-gray-300'
            };

            echo "<div class='border $color px-4 py-3 rounded mb-4'>$message</div>";
        }

        unset($_SESSION['notification']);
    }

    public static function displayError($errors, $path) {
        if (!empty($errors)) {

            foreach ($errors as $msg) {
                self::notification('error', $msg . "<br>");
            }

            self::redirect($path);
        }
    }

    public static function notification($type, $message) {
        // On stocke une LISTE, pas une seule valeur
        $_SESSION['notification'][] = [
            "type" => $type,
            "message" => $message
        ];
    }

    public static function validate($data, $rules) {

        $errors = [];

        foreach ($rules as $field => $ruleSet) {

            $value = trim($data[$field] ?? '');

            foreach ($ruleSet as $rule => $option) {

                if ($rule === 'required' && $value === '') {
                    $errors[] = "Le champs $field est obligatoire";
                }

                if ($rule === 'email' && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Le champs $field doit être un email valide";
                }

                if ($rule === 'min' && strlen($value) < $option) {
                    $errors[] = "Le champs $field doit faire au moins $option caractères";
                }

                if ($rule === 'max' && strlen($value) > $option) {
                    $errors[] = "Le champs $field doit faire au maximum $option caractères";
                }

                if ($rule === 'tel' && $value !== '') {
                    $prefix = ['01', '02', '03', '04', '05', '06', '07', '09'];
                    
                    $valid = false;
                    foreach ($prefix as $p) {
                        if (str_starts_with($value, $p)) {
                            $valid = true;
                            break;
                        }
                    }

                    if (!$valid) {
                        $errors[] = "Le champs $field est invalide";
                    }
                }
            }
        }

        return $errors;
    }

    public static function redirect($path) {
        header("Location: " . BASE_URL . $path);
        exit;
    }
}