<?php

namespace Aisconverse\Hooks;


class FilterHooks extends BaseHooks {


	static function xmlrpc_enabled() {

		return FALSE;
	}

	static function show_admin_bar() {

		return FALSE;
	}
}