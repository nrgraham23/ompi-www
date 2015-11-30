<?php
$topdir = "../../..";
$title = "MPI_Keyval_free(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_KEYVAL_FREE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Keyval_free</b> - Frees attribute key for communicator cache attribute
-- use of this routine is deprecated.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Keyval_free(int *keyval)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_KEYVAL_FREE(KEYVAL, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;KEYVAL, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameter</a></h2>

<dl>

<dt>keyval </dt>
<dd>Frees the integer key value (integer).
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Note that use of this
routine is <i>deprecated</i> as of MPI-2. Please use <a href="../man3/MPI_Comm_free_keyval.3.php">MPI_Comm_free_keyval</a> instead.
 <p>
This deprecated routine is not available in C++.  <p>
Frees an extant attribute
key. This function sets the value of keyval to  MPI_KEYVAL_INVALID. Note
that it is not erroneous to free an attribute key that is in use, because
the actual free does not transpire until after all references (in other
communicators on the process) to the key have been freed. These references
need to be explicitly freed by the program, either via calls to <a href="../man3/MPI_Attr_delete.3.php">MPI_Attr_delete</a>
that free one attribute instance, or by calls to <a href="../man3/MPI_Comm_free.3.php">MPI_Comm_free</a> that free
all attribute instances associated with the freed communicator.
<p>
<h2><a name='sect7' href='#toc7'>Note</a></h2>
Key
values are global (they can be used with any and all communicators).
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
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
<a href="../man3/MPI_Keyval_create.3.php">MPI_Keyval_create</a> <br>
<a href="../man3/MPI_Comm_free_keyval.3.php">MPI_Comm_free_keyval</a> <br>

<p>
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
<li><a name='toc4' href='#sect4'>Input Parameter</a></li>
<li><a name='toc5' href='#sect5'>Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Note</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
