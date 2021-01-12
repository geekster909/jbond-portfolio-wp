<?php

	class Bp_settings
	{
		function __construct()
		{
			$this->create_bp_settings_db();
		}

		/**
		 * Create BP Settings DB
		 */
		private function create_bp_settings_db()
		{

			global $wpdb;
				
			$querystr = "
				CREATE TABLE IF NOT EXISTS _bp_settings 
				(
					id INT NOT NULL AUTO_INCREMENT, 
					PRIMARY KEY(id), 
					netlify_staging_webhook VARCHAR(255),
					netlify_staging_badge VARCHAR(255),
					netlify_production_webhook VARCHAR(255),
					netlify_production_badge VARCHAR(255)
				)
			 ";

			$results = $wpdb->get_results($querystr, OBJECT);

			if (count($this->getBpSettings()) < 1) {
				$querystr = "
					INSERT INTO _bp_settings 
					(
						netlify_staging_webhook,
						netlify_staging_badge,
						netlify_production_webhook,
						netlify_production_badge
					)
					VALUES (
						'',
						'',
						'',
						''
					)
				 ";

				$results = $wpdb->get_results($querystr, OBJECT);
			}
		}

		public function getBpSettings()
		{

			global $wpdb;
			
			$querystr = "
				SELECT * 
				FROM _bp_settings
			 ";

			$results = $wpdb->get_results($querystr, OBJECT);
			
			return $results;
		}

		public function saveBpSettings()
		{
			$data = $_POST;

			global $wpdb;
			
			$querystr = "
				UPDATE _bp_settings
				SET
					netlify_staging_webhook = '".$data['netlify-staging-webhook']."',
					netlify_staging_badge = '".$data['netlify-staging-badge']."',
					netlify_production_webhook = '".$data['netlify-production-webhook']."',
					netlify_production_badge = '".$data['netlify-production-badge']."'
				WHERE id = 1
			 ";

			$results = $wpdb->get_results($querystr, OBJECT);
			
			header('Location: admin.php?page=bp_settings&status=success');

			exit;
		}
	}