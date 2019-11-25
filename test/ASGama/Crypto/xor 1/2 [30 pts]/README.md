Description:
... <br>
assert len(flag) % 2 == 0 <br>
half1 = flag[:len(flag)/2] <br>
half2 = flag[len(flag)/2:] <br>

assert xor(half1, half2) == ',#&\x0f\n>\x0f\x08\x1c' <br>