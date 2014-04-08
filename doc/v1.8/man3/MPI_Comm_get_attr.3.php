<?php
$topdir = "../../..";
$title = "MPI_Comm_get_attr(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_COMM_GET_ATTR(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_get_attr</b> - Retrieves attribute value by key.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_get_attr(MPI_Comm comm, int comm_keyval,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *attribute_val, int *flag)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_GET_ATTR(COMM, COMM_KEYVAL, ATTRIBUTE_VAL, FLAG, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, COMM_KEYVAL, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) ATTRIBUTE_VAL
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL FLAG
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
bool MPI::Comm::Get_attr(int comm_keyval, void* attribute_val)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator to which the attribute is attached (handle).
</dd>

<dt>comm_keyval </dt>
<dd>Key value (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>attribute_val </dt>
<dd>Attribute
value, unless f<i>lag</i> = false. </dd>

<dt>flag </dt>
<dd>False if no attribute is associated with
the key (logical).  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_get_attr
retrieves an attribute value by key. The call is erroneous if there is no
key with value <i>keyval</i>. On the other hand, the call is correct if the key
value exists, but no attribute is attached on <i>comm</i> for that key; in that
case, the call returns <i>flag</i> = false. In particular, MPI_KEYVAL_INVALID is
an erroneous key value.  <p>
This function replaces <a href="../man3/MPI_Attr_get.3.php">MPI_Attr_get</a>, the use of
which is deprecated. The C binding is identical. The Fortran binding differs
in that <i>attribute_val</i> is an address-sized integer.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI
standard prescribes portable Fortran syntax for the <i>ATTRIBUTE_VAL</i> argument
only for Fortran 90. Sun FORTRAN 77 users may use the non-portable syntax
<p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND ATTRIBUTE_VAL
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
