text db "1234567890123" 
msg db 'Hello, world!'
len equ 13


mov eax,0xfdec

mov ecx,len
mov ebx,text
mov edx,msg

ulang1:
   add al,byte[ebx]
   xor al,byte[edx]
   add al,3
   inc ebx
   inc edx
   loop ulang1


mov ecx,len
mov ebx,text
mov edx,msg

ulang2:
   add ah,byte[ebx]
   xor ah,byte[edx]
   add ah,3
   inc ebx
   inc edx
   loop ulang2
   