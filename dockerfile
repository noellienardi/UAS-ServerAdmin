FROM php:7.4-apache
# memanggil bantuan docker image, php versi 7.4, dan apache untuk digunakan nanti
RUN docker-php-ext-install mysqli
# install extension mysql dengan bantuan docker php 


COPY index.php /var/www/html/
# copy file index.php ke apache
COPY index2.php /var/www/html/
# copy file index yang baru ke webserver utk github


# chown artinya mengubah kepemilikan dari suatu file. 
# -R artinya dilakukan secara rekursif (memberi efek yang sama ke semua subfolder dibawahnya)

RUN chown -R www-data /var/www/html/ 
# mengubah kepemilikan web server itu untuk sebuah user
RUN chgrp -R www-data /var/www/html/
# mengubah kepemilikan web server untuk group
RUN chmod -R 744 /var/www/html/
# mengubah aturan permission folder web server menjadi hanya bisa di eksekusi oleh user
# nilai 4 artinya membaca
# nilai 2 artinya menulis atau edit file
# nilai 1 artinya menjalankan atau kadang membuka file 
# 744 artinya owner bisa read, write, dan eksekusi
# sedangkan group dan all others hanya bisa membaca

EXPOSE 80:6000
# membuka port 