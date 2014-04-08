<?php
$topdir = "../../..";
$title = "MPI_Attr_put(3) man page (version 1.6.4)";
$meta_desc = "Open MPI v1.6.4 man page: MPI_ATTR_PUT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Attr_put</b> - Stores attribute value associated with a key -- use of
this routine is deprecated.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Attr_put(MPI_Comm comm, int keyval, void *attribute_val)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ATTR_PUT(COMM, KEYVAL, ATTRIBUTE_VAL, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, KEYVAL, ATTRIBUTE_VAL, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator to which attribute will be attached (handle).
</dd>

<dt>keyval </dt>
<dd>Key value, as returned by <a href="../man3/MPI_Keyval_create.3.php">MPI_KEYVAL_CREATE</a> (integer). </dd>

<dt>attribute_val
</dt>
<dd>Attribute value.
<p> </dd>
</dl>

<h2><a name='sect5' href='#toc5'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Description</a></h2>
Note that use of this routine is <i>deprecated</i> as of MPI-2. Please
use <a href="../man3/MPI_Comm_set_attr.3.php">MPI_Comm_set_attr</a> instead.  <p>
This deprecated routine is not available
in C++.  <p>
MPI_Attr_put stores the stipulated attribute value attribute_val
for subsequent retrieval by <a href="../man3/MPI_Attr_get.3.php">MPI_Attr_get</a>. If the value is already present,
then the outcome is as if <a href="../man3/MPI_Attr_delete.3.php">MPI_Attr_delete</a> was first called to delete the
previous value (and the callback function delete_fn was executed), and
a new value was next stored. The call is erroneous if there is no key with
value keyval; in particular MPI_KEYVAL_INVALID is an erroneous key value.
The call will fail if the delete_fn function returned an error code other
than MPI_SUCCESS.
<p>
<h2><a name='sect7' href='#toc7'>Notes</a></h2>
Values of the permanent attributes MPI_TAG_UB, MPI_HOST,
MPI_IO, and MPI_WTIME_IS_GLOBAL may not be changed. <p>
The type of the attribute
value depends on whether C or Fortran is being used. In C, an attribute
value is a pointer (void *); in Fortran, it is a single integer (not a
pointer, since Fortran has no pointers and there are systems for which
a pointer does not fit in an integer, e.g., any  32-bit address system that
uses 64 bits for Fortran DOUBLE PRECISION). <p>
If an attribute is already present,
the delete function (specified when the corresponding keyval was created)
will be called.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C
routines as the value of the function and Fortran routines in the last
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
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_attr.3.php">MPI_Comm_set_attr</a> <br>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>Input Parameters</a></li>
<li><a name='toc5' href='#sect5'>Output Parameter</a></li>
<li><a name='toc6' href='#sect6'>Description</a></li>
<li><a name='toc7' href='#sect7'>Notes</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
