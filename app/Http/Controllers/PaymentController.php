<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PaymentUser;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Course $curso)
    {
        $isEnrrolled = PaymentUser::where('user_id', auth()->user()->id)
            ->where('course_id', $curso->id)
            ->exists();
        if ($isEnrrolled) return redirect()->route('home');
        return view('payment.checkout', compact('curso'));
    }

    public function pay(Course $curso)
    {
        return redirect()->route('home');
        // //*conectar con la API de paypal

        // $apiContext = new \PayPal\Rest\ApiContext(
        //     new \PayPal\Auth\OAuthTokenCredential(
        //         config('services.paypal.client_id'),     // ClientID
        //         config('services.paypal.client_secret')      // ClientSecret
        //     )
        // );
        // $apiContext->setConfig(config('services.paypal.settings'));


        // $payer = new \PayPal\Api\Payer();
        // $payer->setPaymentMethod('paypal');

        // $amount = new \PayPal\Api\Amount();
        // $amount->setTotal($curso->price->value);
        // $amount->setCurrency('USD');

        // $transaction = new \PayPal\Api\Transaction();
        // $transaction->setAmount($amount);

        // $redirectUrls = new \PayPal\Api\RedirectUrls();
        // $redirectUrls->setReturnUrl(route('payment.approved', $curso))
        //     ->setCancelUrl(route('payment.checkout', $curso));

        // $payment = new \PayPal\Api\Payment();
        // $payment->setIntent('sale')
        //     ->setPayer($payer)
        //     ->setTransactions(array($transaction))
        //     ->setRedirectUrls($redirectUrls);



        // try {
        //     $payment->create($apiContext);
        //     //*away es para que redireccione a una url externa
        //     return redirect()->away($payment->getApprovalLink());
        // } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        //     // This will print the detailed information on the exception.
        //     //REALLY HELPFUL FOR DEBUGGING
        //     echo $ex->getData();
        // }
    }


    public function approved(Request $request, Course $curso)
    {
        // $apiContext = new \PayPal\Rest\ApiContext(
        //     new \PayPal\Auth\OAuthTokenCredential(
        //         config('services.paypal.client_id'),     // ClientID
        //         config('services.paypal.client_secret')  // ClientSecret
        //     )
        // );

        // $paymentId = $_GET['paymentId'];
        // $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        // $execution = new \PayPal\Api\PaymentExecution();
        // $execution->setPayerId($_GET['PayerID']);

        // $payment->execute($execution, $apiContext);

        // // Obtener la información del pagador, incluyendo la dirección de envío
        // $payer = $payment->getPayer();
        // $payerInfo = $payer->getPayerInfo();
        // $shippingAddress = $payerInfo->getShippingAddress();

        // // Puedes acceder a la dirección de residencia de la siguiente manera:
        // $userAddress = $shippingAddress->getLine1();  // Dirección de la primera línea
        // $userCity = $shippingAddress->getCity();  // Ciudad
        // $userState = $shippingAddress->getState();  // Estado
        // $userCountry = $shippingAddress->getCountryCode();  // Código de país
        // $userPostalCode = $shippingAddress->getPostalCode();  // Código postal

        // Luego, puedes guardar estos datos en la base de datos
        $curso->students()->attach(auth()->user()->id);

        $lastNumberSerie = PaymentUser::select('numero')->latest('numero')->first();
        if (!$lastNumberSerie) {
            $lastNumberSerie = 0;
        } else {
            // Extraer el valor de la columna 'numero'
            $lastNumberSerie = $lastNumberSerie->numero;
        }

        $data_invoce = [
            'serie' => 'B001',
            'numero' => $lastNumberSerie + 1,
            'codigo_boleta' => 'B001-' . ($lastNumberSerie + 1),
            'user_social' => auth()->user()->name,
            'user_address' => null,
            'user_id' => auth()->user()->id,
            'course_id' => $curso->id,
            'course_description' => $curso->title,
            'amount' => 1,
            'date' => now(),
            'venta_total' => $curso->price->value,
        ];

        //Generar PDF
        $pdf = Pdf::loadView('pdf.invoice', compact('data_invoce'));

        // Usar el operador de concatenación correcto y obtener la ruta del archivo
        $filePath = storage_path('app/public/invoices/' . '20486841495-' . 'B001-' . ($lastNumberSerie + 1) . '.pdf');

        // Guardar el PDF en la ruta especificada
        $pdf->save($filePath);

        // Luego, puedes asignar la URL de acceso público al archivo
        $url = asset('storage/invoices/' . '20486841495-' . 'B001-' . ($lastNumberSerie + 1) . '.pdf');


        $data_invoce['pdf_url'] = $url;

        PaymentUser::create($data_invoce);

        return redirect()->route('courses.status', $curso);
    }
}
