import cgi, strtabs
import strutils as str

const TARGET_FILE = "data.txt"

let isi_file = readFile(TARGET_FILE)
var array_isi_file = str.split(isi_file,"\n")

# echo(array_isi_file[0])
array_isi_file[0]=intToStr( str.parseInt(array_isi_file[0])+1 )
# echo(array_isi_file[0])

var to_be_written : string = ""
# echo("sebelum for")
for i in array_isi_file:
    to_be_written = to_be_written & i & "\n"

echo(to_be_written)
writeFile(TARGET_FILE, to_be_written)