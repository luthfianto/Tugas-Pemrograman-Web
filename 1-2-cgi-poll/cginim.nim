import strtabs, cgi

import strutils as str
import tables

let url = getQueryString()

var stringpairs:seq[string]

if str.contains(url,"?"):
  stringpairs = str.split(str.split(url,"?")[1],"&")
else:
  stringpairs = str.split(url,"&")

var
  parsed=initTable[string, string]()
  splitted:seq[string]


writeContentType()
writeln(stdout, "<!DOCTYPE html>\n")
writeln(stdout, "<html><head><title>M. Rizky Luthfianto 12/336268/PA/15084</title></head><body>\n")

writeln(stdout, "M. Rizky Luthfianto 12/336268/PA/15084" & "<br/><br/>")
writeln(stdout, "Fields ----- Values:" & "<br/>")
for pair in stringpairs:
  if str.contains(pair,"="):
    splitted=str.split(pair, "=")
    parsed[splitted[0]] = splitted[1]
    writeln(stdout, splitted[0] & " ----- " & splitted[1] & "<br/>")
  else:
    parsed[pair] = ""
    writeln(stdout, pair & "<br/>")

##############################
writeln(stdout, "</body></html>")

