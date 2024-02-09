    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;

    class ProfileController extends Controller
    {
        public function update(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string|max:50',
                'old_password' => $request->filled('new_password') ? 'required|string' : '',
                'password' => 'nullable|string|min:4|different:old_password',
                'image_data' => 'required|image',
            ]);

            $user = Auth::user();

            if ($request->filled('old_password') && !Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Incorrect Old Password');
            }
            $user->name = $request->name;

            if ($request->filled('new_password')) {
                $userData['password'] = Hash::make($request->new_password);
            }

            if ($request->hasFile('image_data')) {
                $image = $request->file('image_data');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/'), $imageName);
                $userData['image_data'] = $imageName;
            }

            /** @var \App\Models\User $user  */
            // $user->update($userData);
            $user->update($userData); 
            $user->save(); 

            return redirect()->back()->with('success', 'Profile updated');
        }
    }
