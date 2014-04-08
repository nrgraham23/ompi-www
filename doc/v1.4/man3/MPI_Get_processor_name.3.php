<?php
$topdir = "../../..";
$title = "MPI_Get_processor_name(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_GET_PROCESSOR_NAME(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Get_processor_name </b> - Gets the name of the processor.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Get_processor_name(char *name, int *resultlen)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GET_PROCESSOR_NAME(NAME, RESULTLEN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*)<tt> </tt>&nbsp;<tt> </tt>&nbsp;NAME
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;RESULTLEN, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Get_processor_name(char* name, int&amp; resultlen)
</pre>
<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>name </dt>
<dd>A unique specifier for the actual (as opposed to
virtual) node. </dd>

<dt>resultlen </dt>
<dd>Length (in characters) of result returned in name.
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
This routine returns
the name of the processor on which it was called at the moment of the call.
The name is a character string for maximum flexibility. From this value
it must be possible to identify a specific piece of hardware. The argument
name must represent storage that is at least MPI_MAX_PROCESSOR_NAME characters
long.  <p>
The number of characters actually written is returned in the output
argument, resultlen.  <p>

<h2><a name='sect7' href='#toc7'>Notes</a></h2>
The user must provide at least MPI_MAX_PROCESSOR_NAME
space to write the processor name; processor names can be this long. The
user should examine the output argument, resultlen, to determine the actual
length of the name. <p>

<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI:Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Output Parameters</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
