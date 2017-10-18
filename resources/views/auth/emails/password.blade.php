Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?usuario='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
