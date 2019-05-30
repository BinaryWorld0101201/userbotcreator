<?php
we:
$settings = ['session' => 'sessions/appoggio2.madeline', 'readmsg' => true, 'auto_reboot' => true, 'multithread' => false, 'old_update_parser' => false, 'madeline' => ['app_info' => ['api_id' => 278690, 'api_hash' => '4c441ef5982f3c3eceb186659be92fdb', 'lang_code' => 'it', 'app_version' => '4.7.0'], 'logger' => ['logger' => 0]]];
	$dir = readline("\n\nInserisca ora directory dove presente sessioni (tipo sessions):");
	$l = readline("\n\nInserisca ora il link:");
	$mex =  readline("\n\nInserisca ora testo da mandare a gruppo joins:");
	foreach(array_diff(scandir("$dir"), ['.', '..']) as $sexa)
	{
		try{
			$MadelineProto = new \danog\MadelineProto\API('sessions/'.$sexa, $settings['madeline']);
			echo "\nh";
				
	$MadelineProto->channels->joinChannel(['channel' => $l, ]);
		$MadelineProto->messages->sendMessage(['peer' => $mex, 'message' => "asd", 'parse_mode' => 'html']);
		echo "\n\n";}catch(Exception $e){continue;}
		
	}
// ©️ un tecnologia assordante

$nome = readline("\n\nChe nome metto al sessione?!").rand(74,234234);
require_once 'madeline.phar';
$MadelineProto = new \danog\MadelineProto\API('sessions/'.$nome.'.madeline', $settings['madeline']);
$MadelineProto->phone_login(readline("\n\n".'Pregasi inserire phone numer con prefisso tipo +11234: '));
try
{
$authorization = $MadelineProto->complete_phone_login(readline("\n\n".'Pregasi inserire suo codice appena mandato: '));
}catch(Exception $e)
{
	$e = $e->getMessage();
	if($e == 'Telegram ha ritornato un errore RPC: The provided phone number is banned from telegram (PHONE_NUMBER_BANNED)')
	{
		echo "\n\n\n<br>Questo suo phone numero inserito e bannato dal gram.<br><br>Ritorno all'inizio.";
		goto we;
	}
}
if ($authorization['_'] === 'account.password') {
    $authorization = $MadelineProto->complete_2fa_login(readline("\n\n".'Pregasi inserire sua passord (suo consiglio e '.$authorization['hint'].'): '));
}
if ($authorization['_'] === 'account.needSignup') {
	$ce = true;
    $authorization = $MadelineProto->complete_signup(readline("\n\n".'Inserisca boll nome: '), readline('Inserisca cognome (non merda necessasrio): '));
    
} 
$me = $MadelineProto->get_self()['first_name'];
if(!isset($ce))
{
	if(stripos(readline("\n\nGià ce merdanome $me, vuole desidera cambiarlo? (si/no)"), 'si') === 0)
	{
		$MadelineProto->account->updateProfile(['first_name' => readline("\n\nInserisca ora il nuovo nome!"), 'last_name' => '', 'about' => '', ]);
		bagg:
		try
		{
		$MadelineProto->account->updateUsername(['username' => readline("\n\nInserisca ora il nuovo usernamo!"), ]);
		}
		
		catch(Exception $e)
		{
			echo "\n\nUsername non valido. retry\n";
			goto bagg;
		}
		
	}else goto joinseso;
}

joinseso:
if(stripos(readline("\n\nVuole entrare in un grupa!? (si/no) "), 'si') === 0)
{
	unset($ce);
	
	if(!isset($l))
	{
		$l = readline("\n\nInserisca ora il link:");
	$MadelineProto->channels->joinChannel(['channel' => $l, ]);
	$MadelineProto->messages->sendMessage(['peer' => $l, 'message' => readline("\n\nMessaggio da mandare a merdagruppo:"), 'parse_mode' => 'html']);
}else{
	$MadelineProto->channels->joinChannel(['channel' => $l, ]);
	$MadelineProto->messages->sendMessage(['peer' => $l, 'message' => readline("\n\nMessaggio da mandare a merdagruppo:"), 'parse_mode' => 'html']);
}
}else goto skip;



skip:
if(stripos(readline("\n\nHo creato $me.\n\nDesidera creare altra sessione (si/no) "), 'si') === 0)
{
	goto we;
} else{
	exit;
}
