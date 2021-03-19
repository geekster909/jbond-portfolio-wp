<?php 
    $status = isset($_GET['status']) ? $_GET['status'] : null;
    $settings = $this->getModel()->getBpSettings();
    $settings = $settings[0];
?>
<div class="bp-wrap">
	<?php if (false): ?>
		<div id="message" class="notice notice-error is-dismissible" style="margin-top: 20px; margin-bottom: 20px;"><p>Alert - <?php echo urldecode($this->error_message); ?>. Please correct error and try again.</p></div>
	<?php endif; ?>
    <h1 class="bp-block-title"><svg class="icon-title"><use xlink:href="#importer"></use></svg>Deployment</h1>
    <a class="back-to-dashboard" href="?page=bp_dashboard">&larr; Back to Dashboard</a>
    <?php if (!is_null($status)): ?>
        <br>
        <?php $containerClasses = 'notice is-dismissible' ?>
        <?php $containerClasses .= $status == 'success' ? ' notice-success' : ' notice-error'; ?>
        <?php $msg = $status == 'success' ? 'Deployment Successful' : 'Deployment Failed'; ?>
        <div id="message" class="<?php echo $containerClasses; ?>"><p><?php echo $msg; ?></p></div>
    <?php endif; ?>
    <div class="bp-admin-box">
        <div class="bp-deployment-outer-wrapper" id="js-option">
            <div class="bp-deployment-inner-wrapper">
                <h2>Select an enviroment to deploy:</h2>
                <a href="admin.php?page=bp_deployment&action=deploy&environment=staging" class="js-bp-deployment-type button button-hero" data-type="staging" <?php echo !$settings->staging_webhook ? 'disabled' : '' ?>>Staging</a>
                <a href="admin.php?page=bp_deployment&action=deploy&environment=production" class="js-bp-deployment-type button button-hero" data-type="production" <?php echo !$settings->production_webhook ? 'disabled' : '' ?>>Production</a>
                <?php if ($settings->staging_badge || $settings->production_badge) : ?>
                    <br />
                    <br />
                    <br />
                    <hr />
                    <br />
                    <h2>Environment deployment status:</h2>
                    <div class="bp-deployment-status">
                        <div class="bp-deployment-status-head">
                            <h2>Staging</h2>
                            <h2>Production</h2>
                        </div>
                        <div class="bp-deployment-status-body">
                            <div>
                            <?php if ($settings->staging_badge) : ?>
                                <img class="staging-badge" src="<?php echo $settings->staging_badge; ?>"></h3>
                            <?php endif; ?>
                            </div>
                            <div>
                            <?php if ($settings->production_badge) : ?>
                                <img class="production-badge" src="<?php echo $settings->production_badge; ?>">
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br />
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>