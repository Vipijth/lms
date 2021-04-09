

               function fileTypeValidation() {

         var fileInput = document.getElementById('customFile');

                                       var fileInputType = document.getElementById('filetype').value;

                                var filePath = fileInput.value;
document.getElementById('f1').innerHTML=fileInput.value;
                                // Allowing file type

                                if(fileInputType=="video")
                                {
                             var  allowedExtensions =
                                        /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

                                                 if (!allowedExtensions.exec(filePath)) {
                                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                                                fileInput.value = '';
                                                    document.getElementById('f1').innerHTML='';
                                               return false;
                                                             }
                              }

                                 if(fileInputType!="video")
                                    {
                                          var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
                  if (!allowedExtensions.exec(filePath)) {
           alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                       fileInput.value = '';
                           document.getElementById('f1').innerHTML='';
                 return false;
                               }
                                          }


                                }


               function fileTypeValidation1() {

         var fileInput = document.getElementById('customFile1');

                           document.getElementById('f2').innerHTML=fileInput.value;            var fileInputType = document.getElementById('filetype1').value;

                                var filePath = fileInput.value;

                                // Allowing file type

                                if(fileInputType=="video")
                                {
                             var  allowedExtensions =
                                        /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

                                                 if (!allowedExtensions.exec(filePath)) {
                                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                                                fileInput.value = '';
                                                  document.getElementById('f2').innerHTML='';
                                               return false;
                                                             }
                              }
                   if(fileInputType!="video")
                   {
                       var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
                       if (!allowedExtensions.exec(filePath)) {
                           alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                           fileInput.value = '';
                           document.getElementById('f2').innerHTML='';
                           return false;
                       }
                   }

                                }



               function fileTypeValidation2() {

         var fileInput = document.getElementById('customFile2');
document.getElementById('f3').innerHTML=fileInput.value;
                                       var fileInputType = document.getElementById('filetype2').value;

                                var filePath = fileInput.value;

                                // Allowing file type

                                if(fileInputType=="video")
                                {
                             var  allowedExtensions =
                                        /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

                                                 if (!allowedExtensions.exec(filePath)) {
                                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                                                fileInput.value = '';
                                                   document.getElementById('f3').innerHTML='';
                                               return false;
                                                             }
                              }

                   if(fileInputType!="video")
                   {
                       var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
                       if (!allowedExtensions.exec(filePath)) {
                           alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                           fileInput.value = '';
                           document.getElementById('f3').innerHTML='';
                           return false;
                       }
                   }

                                }



               function fileTypeValidation3() {

         var fileInput = document.getElementById('customFile3');
document.getElementById('f4').innerHTML=fileInput.value;
                                       var fileInputType = document.getElementById('filetype3').value;

                                var filePath = fileInput.value;

                                // Allowing file type

                                if(fileInputType=="video")
                                {
                             var  allowedExtensions =
                                        /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

                                                 if (!allowedExtensions.exec(filePath)) {
                                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                                                fileInput.value = '';
                                                document.getElementById('f4').innerHTML='';
                                               return false;

                                                             }
                              }

                   if(fileInputType!="video")
                   {
                       var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
                       if (!allowedExtensions.exec(filePath)) {
                           alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                           fileInput.value = '';
                           document.getElementById('f4').innerHTML='';
                           return false;
                       }
                   }



                                }

