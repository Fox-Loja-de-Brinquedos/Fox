    <?php 

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\registerController;
    use App\Http\Controllers\AuthenticatedSessionController;

    Route::middleware('guest')->group(function () {
        
    //registro    
    Route::get('/register', [registerController::class, 'create'])->name('register');
    Route::post('/register', [registerController::class, 'store']);
    //---------


    //logar
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    //---------
    });