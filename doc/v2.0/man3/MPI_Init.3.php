<?php
$topdir = "../../..";
$title = "MPI_Init(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_INIT(3)";

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
<b>MPI_Init</b> - Initializes the MPI execution environment
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>
<h2><a name='sect2' href='#toc2'>C
Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Init(int *argc, char ***argv)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_INIT(IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Init(int&amp; argc, char**&amp; argv)
void MPI::Init()
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>argc </dt>
<dd>C/C++ only: Pointer to the number of arguments. </dd>

<dt>argv
</dt>
<dd>C/C++ only: Argument vector.
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
This routine, or <a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a>, must be
called before most other MPI routines are called.  There are a small number
of exceptions, such as <a href="../man3/MPI_Initialized.3.php">MPI_Initialized</a> and <a href="../man3/MPI_Finalized.3.php">MPI_Finalized</a>.  MPI can be initialized
at most once; subsequent calls to MPI_Init or <a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a> are erroneous.
<p>
All MPI programs must contain a call to MPI_Init or <a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a>. Open
MPI accepts the C/C++ <i>argc</i> and <i>argv</i> arguments to main, but neither modifies,
interprets, nor distributes them: <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;{
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;/* declare variables */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Init(&amp;argc, &amp;argv);
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;/* parse arguments */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;/* main program */
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>();
<tt> </tt>&nbsp;<tt> </tt>&nbsp;}
</pre>
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
The Fortran version does not have provisions for <i>argc</i> and <i>argv</i> and
takes only IERROR. <p>
The MPI Standard does not say what a program can do before
an MPI_Init or after an <a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>. In the Open MPI implementation, it
should do as little as possible. In particular, avoid anything that changes
the external state of the program, such as opening files, reading standard
input, or writing to standard output.
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
continue past an error. <p>
See the MPI man page for a full list of MPI error
codes.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_Init_thread.3.php">MPI_Init_thread</a>
<a href="../man3/MPI_Initialized.3.php">MPI_Initialized</a>
<a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>
<a href="../man3/MPI_Finalized.3.php">MPI_Finalized</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
