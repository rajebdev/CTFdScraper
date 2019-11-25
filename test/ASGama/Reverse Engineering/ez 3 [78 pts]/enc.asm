section	.data
flag db  "CENSOREDFLAGXXXXXXXXXXXXXXX" 
key db   "encrypencrypencrypencrypenc"
cipher db  "000000000000000000000000000"
len equ 27

mov ecx,len
mov ebx,flag
mov edx,key
mov edi,cipher

ulang:
   mov al,byte[ebx]
   sub al,5
   xor al,byte[edx]
   mov byte[edi],al
   inc ebx
   inc edx
   inc edi
   loop ulang

;Result
;======================================================================================================================================
;0x59,0x20,0x21,0x2e,0x11,0x2c,0x13,0x41,0x0d,0x1c,0x57,0x18,0x38,0x09,0x17,0x28,0x57,0x19,0x3b,0x03,0x17,0x19,0x16,0x5c,0x4e,0x07,0x1b