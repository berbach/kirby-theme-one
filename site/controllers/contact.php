<?php

return function ($site, $pages, $page) {
    require_once kirby()->roots()->controllers() . '/shared/shared-controller.php';

    if (get('submit-form') == true) {
        $name = get('name');
        $mail_from = get('mail');
        $message = get('message');
        $honeypot = get('url');

        if ($honeypot != '') {
            die();
        }

        if ($name != '' || $mail_from != '' || $message != '') {

            $email = email(array(
                'to' => $page->form_mail(),
                'from' => $name . ' <' . $mail_from . '>',
                'subject' => $page->form_subject(),
                'body' => $message
            ));

            if ($email->send()) {
                $contact_message = 'CONTACT_MAIL_SEND';
            } else {
                $contact_message = 'CONTACT_MAIL_FAIL';
            }
        } else {
            $contact_message = 'CONTACT_MISSING_INPUT';
        }
    }

    return compact('phone', 'headline_color', 'header', 'rgb', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb', 'contact_message');
};
