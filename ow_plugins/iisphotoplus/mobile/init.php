<?php

IISPHOTOPLUS_MCLASS_EventHandler::getInstance()->init();
OW::getRouter()->addRoute(new OW_Route('iisphotoplus.ajax_upload_submit', 'iisphotoplus/ajax-upload-submit', 'IISPHOTOPLUS_MCTRL_AjaxUpload', 'submitPhotos'));