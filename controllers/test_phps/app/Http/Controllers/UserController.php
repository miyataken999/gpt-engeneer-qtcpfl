namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $teams = Team::all();

        return view('users.edit', compact('user', 'teams'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'profile' => 'required|string',
            'team_id' => 'required|exists:teams,id',
        ]);

        $user->update([
            'profile' => $request->input('profile'),
            'team_id' => $request->input('team_id'),
        ]);

        return redirect()->route('users.show', $user);
    }
}