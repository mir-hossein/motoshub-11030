<?php

/**
 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is
 * licensed under The BSD license.

 * ---
 * Copyright (c) 2011, Oxwall Foundation
 * All rights reserved.

 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the
 * following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice, this list of conditions and
 *  the following disclaimer.
 *
 *  - Redistributions in binary form must reproduce the above copyright notice, this list of conditions and
 *  the following disclaimer in the documentation and/or other materials provided with the distribution.
 *
 *  - Neither the name of the Oxwall Foundation nor the names of its contributors may be used to endorse or promote products
 *  derived from this software without specific prior written permission.

 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * @author Zarif Safiullin <zaph.work@gmail.com>
 * @package ow_plugins.mailbox
 * @since 1.6.1
 */
OW::getRouter()->addRoute(new OW_Route('mailbox_user_list', 'mailbox/users', 'MAILBOX_CTRL_Mailbox', 'users'));
OW::getRouter()->addRoute(new OW_Route('mailbox_conv_list', 'mailbox/convs', 'MAILBOX_CTRL_Mailbox', 'convs'));
OW::getRouter()->addRoute(new OW_Route('mailbox_chat_conversation', 'messages/chat/:userId', 'MAILBOX_MCTRL_Messages', 'chatConversation'));
OW::getRouter()->addRoute(new OW_Route('mailbox_mail_conversation', 'messages/mail/:convId', 'MAILBOX_MCTRL_Messages', 'mailConversation'));
OW::getRouter()->addRoute(new OW_Route('mailbox_compose_mail_conversation', 'messages/compose/:opponentId', 'MAILBOX_MCTRL_Messages', 'composeMailConversation'));
OW::getRouter()->addRoute(new OW_Route('mailbox_ajax_remove_message', 'mailbox/ajax/remove_message', 'MAILBOX_CTRL_Ajax', 'removeMessage'));
OW::getRouter()->addRoute(new OW_Route('mailbox_edit_message', 'mailbox/ajax/edit_message', 'MAILBOX_CTRL_Ajax', 'editMessage'));

$eventHandler = new MAILBOX_CLASS_EventHandler();
$eventHandler->genericInit();

OW::getEventManager()->bind(BASE_CTRL_Ping::PING_EVENT . '.mobileMailboxConsole', array($eventHandler, 'onPing'));

$eventHandler = new MAILBOX_MCLASS_EventHandler();
$eventHandler->init();