<?php
require_once 'Bp_settings.php';

class Bp_deployment extends Bp_settings
{

    public function deploy()
    {
        $this->type = $_GET['environment'];

        if ($this->type) {
            $settings = Bp_settings::getBpSettings();
            $settings = $settings[0];

            if ($this->type === 'staging' && !!$settings->staging_webhook) {
                $webhookUrl = $settings->staging_webhook;
            } else if ($this->type === 'production' && !!$settings->production_webhook) {
                $webhookUrl = $settings->production_webhook;
            }

            if ($webhookUrl) {
                // Get cURL resource
                $curl = curl_init();
                // Set some options - we are passing in a useragent too here
                curl_setopt_array($curl, [
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => $webhookUrl,
                    CURLOPT_POST => '',
                    CURLOPT_POSTFIELDS => '',
                    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
                ]);
                // Send the request & save response to $resp
                $resp = curl_exec($curl);
                // Close request to clear up some resources
                curl_close($curl);

                header('Location: admin.php?page=' . strtolower(get_class()) . '&status=success');
            } else {
                header('Location: admin.php?page=' . strtolower(get_class()) . '&status=error');
            }
        } else {
            header('Location: admin.php?page=' . strtolower(get_class()) . '&status=error');
        }
    }
}