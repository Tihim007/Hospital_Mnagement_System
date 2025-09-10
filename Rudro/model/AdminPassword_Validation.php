<?php

class Validation {
    // returns [bool $ok, array $errors]
    public static function validateChangePassword(string $old, string $new, string $confirm): array {
        $errors = [];

        if ($old === '') {
            $errors['oldpass'] = 'Old password is required.';
        }
        if ($new === '') {
            $errors['newpass'] = 'New password is required.';
        } elseif (strlen($new) < 6) {
            $errors['newpass'] = 'New password must be at least 6 characters.';
        }

        if ($confirm === '') {
            $errors['confirmpass'] = 'Please confirm your new password.';
        } elseif ($new !== $confirm) {
            $errors['confirmpass'] = 'New password and confirm password do not match.';
        }

        return [empty($errors), $errors];
    }
}
