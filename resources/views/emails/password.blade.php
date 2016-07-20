Click en el link para reestablecer su contraseña : <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> Reestablecer contraseña </a>
