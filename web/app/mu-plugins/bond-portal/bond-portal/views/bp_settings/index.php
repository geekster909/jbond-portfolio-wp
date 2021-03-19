<?php $settings = $this->getModel()->getBpSettings();  ?>
<?php $settings = $settings[0];  ?>
<?php 
    $status = isset($_GET['status']) ? $_GET['status'] : null;
?>
<div class="bp-wrap">
    <h1 class="bp-block-title"><svg class="icon-title"><use xlink:href="#settings"></use></svg>General Settings</h1>
    <a class="back-to-dashboard" href="?page=bp_dashboard">&larr; Back to Dashboard</a>
    <?php if (!is_null($status)): ?>
        <br>
        <?php $containerClasses = 'notice is-dismissible' ?>
        <?php $containerClasses .= $status == 'success' ? ' notice-success' : ' notice-error'; ?>
        <?php $msg = $status == 'success' ? 'Settings Saved' : 'Error Saving Settings'; ?>
        <div id="message" class="<?php echo $containerClasses; ?>"><p><?php echo $msg; ?></p></div>
    <?php endif; ?>
    <div class="bp-admin-box">
        <form id="bp-dealer-form" action="?page=bp_settings&action=saveBpSettings" method="post">
            <div class="bp-deployment-inner-wrapper" style="text-align: left;">
                <h2>Bond Portal Settings</h2>
                <div class="acf-field acf-field-text">
                    <div class="acf-label">
                        <label for="staging-webhook">Staging Webhook</label>
                    </div>
                    <div class="acf-input">
                        <div class="acf-input-wrap">
                            <input id="staging-webhook" type="text" name="staging-webhook" value="<?php echo $settings->staging_webhook; ?>">
                        </div>
                    </div>
                </div>
                <br />
                <div class="acf-field acf-field-text">
                    <div class="acf-label">
                        <label for="staging-badge">Staging Badge</label>
                    </div>
                    <div class="acf-input">
                        <div class="acf-input-wrap">
                            <input id="staging-badge" type="text" name="staging-badge" value="<?php echo $settings->staging_badge; ?>">
                        </div>
                    </div>
                </div>
                <br />
                <div class="acf-field acf-field-text">
                    <div class="acf-label">
                        <label for="production-webhook">Production Webhook</label>
                    </div>
                    <div class="acf-input">
                        <div class="acf-input-wrap">
                            <input id="production-webhook" type="text" name="production-webhook" value="<?php echo $settings->production_webhook; ?>">
                        </div>
                    </div>
                </div>
                <br />
                <div class="acf-field acf-field-text">
                    <div class="acf-label">
                        <label for="production-badge">Production Badge</label>
                    </div>
                    <div class="acf-input">
                        <div class="acf-input-wrap">
                            <input id="production-badge" type="text" name="production-badge" value="<?php echo $settings->production_badge; ?>">
                        </div>
                    </div>
                </div>
                <br />
                <div>
                    <input type="submit" value="Save" class="button bp-button button-hero" />
                </div>
            </div>
        </form>
    </div>
</div>