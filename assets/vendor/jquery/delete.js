function confirmationDelete(anchor)
{
   var conf = confirm('Apakah Anda yakin ingin menghapusnya?');
   if(conf)
      window.location=anchor.attr("href");
}