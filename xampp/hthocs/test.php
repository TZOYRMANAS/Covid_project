<?php
	/**
	 *  Copyright (c) 13/3/15 , dsphinx@plug.gr
	 *  All rights reserved.
	 *
	 *  Redistribution and use in source and binary forms, with or without
	 *  modification, are permitted provided that the following conditions are met:
	 *   1. Redistributions of source code must retain the above copyright
	 *      notice, this list of conditions and the following disclaimer.
	 *   2. Redistributions in binary form must reproduce the above copyright
	 *      notice, this list of conditions and the following disclaimer in the
	 *      documentation and/or other materials provided with the distribution.
	 *   3. All advertising materials mentioning features or use of this software
	 *      must display the following acknowledgement:
	 *      This product includes software developed by the dsphinx@plug.gr.
	 *   4. Neither the name of the dsphinx@plug.gr nor the
	 *      names of its contributors may be used to endorse or promote products
	 *     derived from this software without specific prior written permission.
	 *
	 *  THIS SOFTWARE IS PROVIDED BY dsphinx@plug.gr ''AS IS'' AND ANY
	 *  EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	 *  DISCLAIMED. IN NO EVENT SHALL dsphinx BE LIABLE FOR ANY
	 *  DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	 *  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	 *  ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	 *  SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
	 *
	 *  Created : 10:27 PM - 13/3/15
	 *
	 */


	if (!defined("APP_Version")) {
		require_once ('../App/Library/Ajax/AjaxSkipFrameworkToDiv.php');
	}


	$config = array(
		'db'      => MyDB::db(),
		'page'    => Controller::$_page['run'],
		'section' => Controller::param('section'),
		'id'      => Controller::param_integer('news_id')
	);


 	var_dump($config);
	var_dump(Semantic::RDFNamespaces());


	echo $section;
