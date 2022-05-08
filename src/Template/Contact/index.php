<be-middle>
    <div class="be-container be-my-400">
        <h1 class="be-h1 be-ta-center be-lh-300"><?php echo $this->title; ?></h1>

        <div class="be-row be-mt-200">
            <div class="be-col-24 be-col-md-13">
                <iframe src="<?php echo beUrl('Contact.Contact.'.$this->configContact->mapType.'Map'); ?>" style="width:100%;height:400px;" scrolling="no" frameborder="0"></iframe>
                <a href="<?php echo beUrl('Contact.Contact.'.$this->configContact->mapType.'Map'); ?>" target="_blank">全屏查看地图</a>
            </div>
            <div class="be-col-0 be-col-md-1"></div>
            <div class="be-col-24 be-col-md-10">
                <?php echo $this->configContact->info; ?>
            </div>
        </div>

        <?php if ($this->configMessage->enable) { ?>

            <h1 class="be-h4 be-mt-200 be-py-100 be-bb"><?php echo $this->configMessage->formTitle; ?></h1>

            <form id="form-contact">
                <?php
                $my = \Be\Be::getUser();
                ?>
                <div class="be-floating be-mt-150">
                    <input type="text" name="name" class="be-input" placeholder="请输入您的名字" value="<?php echo $my->isGuest() ? '' : $my->name; ?>" maxlength="60">
                    <label class="be-floating-label">您的名字<?php echo $this->configMessage->nameRequired ? ' <span class="be-c-red">*</span>' : ''; ?></label>
                </div>

                <div class="be-floating be-mt-150">
                    <input type="text" name="email" class="be-input" placeholder="请输入您的邮箱" value="<?php echo $my->isGuest() ? '' : $my->email; ?>" maxlength="60">
                    <label class="be-floating-label">您的邮箱<?php echo $this->configMessage->emailRequired ? ' <span class="be-c-red">*</span>' : ''; ?></label>
                </div>

                <div class="be-floating be-mt-150">
                    <input type="text" name="mobile" class="be-input" placeholder="请输入您的手机号" maxlength="20">
                    <label class="be-floating-label">您的手机号<?php echo $this->configMessage->mobileRequired ? ' <span class="be-c-red">*</span>' : ''; ?></label>
                </div>

                <div class="be-floating be-mt-150">
                    <textarea name="content" id="contact-content" class="be-textarea" placeholder="留言内容" rows="6"></textarea>
                    <label class="be-floating-label">内容</label>
                </div>

                <div class="be-mt-150">
                    <input type="submit" class="be-btn" value="保 存">
                    <input type="reset" class="be-btn be-ml-100" value="重 置">
                </div>

            </form>

            <script type="text/javascript" language="javascript" src="<?php echo \Be\Be::getProperty('App.Contact')->getUrl(); ?>/Template/js/jquery.validate.min.js"></script>
            <script>
                $(function(){
                    $("#form-contact").validate({
                        rules: {
                            <?php if ($this->configMessage->nameRequired) { ?>
                            name: {
                                required: true
                            },
                            <?php } ?>

                            <?php if ($this->configMessage->emailRequired) { ?>
                            email: {
                                required: true,
                                email: true
                            },
                            <?php } ?>

                            <?php if ($this->configMessage->mobileRequired) { ?>
                            mobile: {
                                required: true
                            },
                            <?php } ?>

                            content: {
                                required: true,
                                maxlength: 500
                            }
                        },
                        messages: {
                            <?php if ($this->configMessage->nameRequired) { ?>
                            name: {
                                required: "请输入您的名字"
                            },
                            <?php } ?>

                            <?php if ($this->configMessage->emailRequired) { ?>
                            email: {
                                required: "请输入您的邮箱",
                                email: "邮箱格式不对"
                            },
                            <?php } ?>

                            <?php if ($this->configMessage->mobileRequired) { ?>
                            mobile: {
                                required: "请输入您的手机号"
                            },
                            <?php } ?>

                            content: {
                                required: "请输入肉容",
                                maxlength: "最多输入{0}个字符"
                            }
                        },

                        submitHandler: function(form){

                            let $submit = $(".btn-submit", $(form));
                            let sValue = $submit.val();

                            $submit.prop("disabled", true).val("正在提交，请稍候...");

                            $.ajax({
                                type: "POST",
                                url: "<?php echo beUrl('Contact.Message.save'); ?>",
                                data: $(form).serialize(),
                                dataType: "json",
                                success: function(json){
                                    $submit.prop("disabled", false).val(sValue);
                                    alert(json.message );
                                    if(json.success) {
                                        $("#contact-content").val("");
                                    }
                                }
                            });

                        }
                    });
                });
            </script>

        <?php } ?>
    </div>
</be-middle>