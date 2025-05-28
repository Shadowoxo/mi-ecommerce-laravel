namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    public function process()
    {
        // Aquí puedes agregar lógica para procesar el pedido, como guardar en la base de datos

        Cart::clear();
        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
