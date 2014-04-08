<?php
$topdir = "../../..";
$title = "MPI_Sizeof(3) man page (version 1.6.4)";
$meta_desc = "Open MPI v1.6.4 man page: MPI_SIZEOF(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Sizeof</b> - Returns the size, in bytes, of the given type
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>

<h2><a name='sect2' href='#toc2'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_SIZEOF(X, SIZE, IERROR)
&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;X
INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SIZE, IERROR
</pre>
<h2><a name='sect3' href='#toc3'>Input Parameter</a></h2>

<dl>

<dt>X </dt>
<dd>A Fortran variable of numeric intrinsic type (choice).

<p> </dd>
</dl>

<h2><a name='sect4' href='#toc4'>Output Parameters</a></h2>

<dl>

<dt>SIZE </dt>
<dd>Size of machine representation of that type (integer).
</dd>

<dt>IERROR </dt>
<dd>Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Description</a></h2>
MPI_SIZEOF returns the size
(in bytes) of the machine representation of the given variable. It is a
generic Fortran type and has a Fortran binding only. This routine is similar
to the sizeof builtin in C/C++. However, if given an array argument, it
returns the size of the base element, not the size of the whole array.
<p>

<h2><a name='sect6' href='#toc6'>Notes</a></h2>
This function is not available in C/C++ because it is not necessary.

<p>
<h2><a name='sect7' href='#toc7'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI:Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.  <p>
See the MPI man page for a full list of MPI
error codes.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>Fortran Syntax</a></li>
<li><a name='toc3' href='#sect3'>Input Parameter</a></li>
<li><a name='toc4' href='#sect4'>Output Parameters</a></li>
<li><a name='toc5' href='#sect5'>Description</a></li>
<li><a name='toc6' href='#sect6'>Notes</a></li>
<li><a name='toc7' href='#sect7'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
