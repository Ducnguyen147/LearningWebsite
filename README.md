<Name Nguyen Anh Duc>
<Neptun AF5T8D>
This solution was submitted and prepared by student named above for the home assignment of the Web engineering course.
I declare that this solution is my own work.
I have not copied or used third party solutions.
I have not passed my solution to my classmates, neither made it public.
Students’ regulation of Eötvös Loránd University (ELTE Regulations Vol. II. 74/C. § ) states that as long as a student presents another student’s work - or at least the significant part of it - as his/her own performance, it will count as a disciplinary fault. The most serious consequence of a disciplinary fault can be dismissal of the student from the University.

To run the application:
composer install
npm install
npm run build
php artisan migrate:fresh
php artisan db:seed --class=LmsSeeder
php artisan serve
