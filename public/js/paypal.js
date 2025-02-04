import { loadScript } from "@paypal/paypal-js";

(async () => {
    let paypal;

    try {
        // Carga el SDK de PayPal
        paypal = await loadScript({
            clientId: "PAYPAL_CLIENT_ID", // Sustituye con tu ID de cliente o cárgalo dinámicamente
            currency: "USD",
        });

        if (!paypal) {
            console.error("El SDK de PayPal no se cargó correctamente.");
            return;
        }

        // Renderiza el botón de PayPal
        paypal
            .Buttons({
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [
                            {
                                amount: {
                                    value: "10.00", // Sustituye con el precio dinámico del curso
                                },
                            },
                        ],
                    });
                },
                onApprove: (data, actions) => {
                    return actions.order.capture().then((details) => {
                        console.log("Compra completada: ", details);
                    });
                },
            })
            .render("#paypal-button-container");
    } catch (error) {
        console.error(
            "Error al cargar el SDK o renderizar los botones de PayPal:",
            error
        );
    }
})();
