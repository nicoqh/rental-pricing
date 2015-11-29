# rent
Example rental pricing with PHP using immutable value objects.

````
namespace Rent;

use DateTime;

require __DIR__.'/vendor/autoload.php';

$order = new Order();

$rentalPeriod = RentalPeriod::fromDateTime(
    DateTime::createFromFormat("Y-m-d H:i", "2015-09-20 02:00"),
    DateTime::createFromFormat("Y-m-d H:i", "2015-09-21 03:10")
);

// Add an item priced 500 per 24 hours (i.e. a daily rate)
$order->addItem(
    new OrderItem('Toastmaker', 1, new Rate(Price::fromAmount(500), 24), $rentalPeriod)
);

var_dump($order->getTotal());
````
