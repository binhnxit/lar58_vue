<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Repositories\UserRepository;
use Auth;
use DB;
use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\HandlesOAuthErrors;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;

class AuthController extends Controller
{
    use HandlesOAuthErrors;

    /** @var $server AuthorizationServer */
    protected $server;

    /**
     * @var $userRepo UserRepository
     */
    protected $userRepo;

    public function __construct()
    {
        parent::__construct();
        $this->server   = app(AuthorizationServer::class);
        $this->userRepo = app(UserRepository::class);
    }

    public function getLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard.index');
        }

        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $certificates = $request->only('email', 'password');

        if (Auth::attempt($certificates)) {
            return $this->success(true);
        }

        return $this->error('Invalid email or password', 403);
    }

    public function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        return $this->success(true);
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return $this->success($user);
    }

    /**
     * @param ServerRequestInterface $request
     * @return \Illuminate\Http\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {

        return $this->withErrorHandling(function () use ($request) {
            $respond = $this->server->respondToAccessTokenRequest($request, new Psr7Response);

            /** @var $user User */
            $user = $this->userRepo->findWhere(['email' => $request->getParsedBody()['username']])->first();
            if (!$user->hasRole('admin')) {
                return $this->error('YOU_HAVE_NOT_PERMISSION', 403);
            }
            $tokenObject = json_decode((string)$respond->getBody());

            $tokenObject->user = $user;
            return $this->success($tokenObject);
        });
    }
}
