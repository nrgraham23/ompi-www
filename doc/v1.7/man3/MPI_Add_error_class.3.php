<?php
$topdir = "../../..";
$title = "MPI_Add_error_class(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_ADD_ERROR_CLASS(3)";

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
<br>
<pre>MPI_Add_error_class - Creates a new error class and returns its value
</pre>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Add_error_class(int *errorclass)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ADD_ERROR_CLASS(ERRORCLASS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;ERRORCLASS, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI::Add_error_class()
</pre>
<h2><a name='sect5' href='#toc5'>Output Parameters</a></h2>

<dl>

<dt>errorclass </dt>
<dd>New error class (integer). </dd>

<dt>IERROR </dt>
<dd>Fortran only:
Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
The function MPI_Add_error_class creates
a new, local error class.
<p>
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
Because this function is local, the same
value of <i>errorclass</i> may not be returned on all processes that make this
call, even if they call the function concurrently. Thus, same error on different
processes may not cause the same value of <i>errorclass</i> to be returned. To
reduce the potential for confusion, <a href="../man3/MPI_Add_error_string.3.php">MPI_Add_error_string</a> may be used on
multiple processes to associate the same error string with the newly created
<i>errorclass</i>. Even though <i>errorclass</i> may not be consistent across processes,
using <a href="../man3/MPI_Add_error_string.3.php">MPI_Add_error_string</a> will ensure the error string associated with
it will be the same everywhere. <p>
No function is provided to free error classes,
as it is not expected that an application will create them in significant
numbers. <p>
The value returned is always greater than or equal to MPI_ERR_LASTCODE.

<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Add_error_code.3.php">MPI_Add_error_code</a>
<a href="../man3/MPI_Add_error_string.3.php">MPI_Add_error_string</a>
<a href="../man3/MPI_Error_class.3.php">MPI_Error_class</a>
<a href="../man3/MPI_Error_string.3.php">MPI_Error_string</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
