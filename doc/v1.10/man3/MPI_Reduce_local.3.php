<?php
$topdir = "../../..";
$title = "MPI_Reduce_local(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_REDUCE_LOCAL(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Reduce_local</b> - Perform a local reduction
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Reduce_local(const void *inbuf, void *inoutbuf, int count,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Datatype datatype, MPI_Op op)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_REDUCE_LOCAL(INBUF, INOUTBUF, COUNT, DATATYPE, OP, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;INBUF(*), INOUTBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COUNT, DATATYPE, OP, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Op::Reduce_local(const void* inbuf, void* inoutbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int count, const MPI::Datatype&amp; datatype, const MPI::Op&amp; op) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>inbuf </dt>
<dd>Address of input buffer (choice). </dd>

<dt>count </dt>
<dd>Number of
elements in input buffer (integer). </dd>

<dt>datatype </dt>
<dd>Data type of elements of input
buffer (handle). </dd>

<dt>op </dt>
<dd>Reduce operation (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>inoutbuf
</dt>
<dd>Address of in/out buffer (choice). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<i>The</i> MPI_Reduce_local function is proposed for MPI-2.2 and (as
of 10 Jan 2009) has not yet been ratified.  Use at your own risk.  See <i>https://svn.mpi-forum.org/trac/mpi-forum-web/ticket/24.</i>
<p>
The global reduce functions (MPI_Reduce_local, <a href="../man3/MPI_Op_create.3.php">MPI_Op_create</a>, <a href="../man3/MPI_Op_free.3.php">MPI_Op_free</a>,
<a href="../man3/MPI_Allreduce.3.php">MPI_Allreduce</a>, MPI_Reduce_local_scatter, <a href="../man3/MPI_Scan.3.php">MPI_Scan</a>) perform a global reduce
operation (such as sum, max, logical AND, etc.) across all the members of
a group. The reduction operation can be either one of a predefined list
of operations, or a user-defined operation. The global reduction functions
come in several flavors: a reduce that returns the result of the reduction
at one node, an all-reduce that returns this result at all nodes, and a
scan (parallel prefix) operation. In addition, a reduce-scatter operation
combines the functionality of a reduce and a scatter operation. <p>
MPI_Reduce_local
combines the elements provided in the input and input/output buffers of
the local process, using the operation op, and returns the combined value
in the inout/output buffer. The input buffer is defined by the arguments
inbuf, count, and datatype; the output buffer is defined by the arguments
inoutbuf, count, and datatype; both have the same number of elements, with
the same type. The routine is a local call.  The process can provide one
element, or a sequence of elements, in which case the combine operation
is executed element-wise on each entry of the sequence. For example, if the
operation is MPI_MAX and the input buffer contains two elements that are
floating-point numbers (count = 2 and datatype = MPI_FLOAT), then <i>inoutbuf(1)</i>
= global max (<i>inbuf(1)</i>) and <i>inoutbuf(2)</i> = global max(<i>inbuf(2)</i>).  <p>

<h2><a name='sect8' href='#toc8'>Use of
In-place Option</a></h2>
The use of MPI_IN_PLACE is disallowed with MPI_Reduce_local.
<p>

<h2><a name='sect9' href='#toc9'>Predefined Reduce Operations</a></h2>
<p>
The set of predefined operations provided by
MPI is listed below (Predefined Reduce Operations). That section also enumerates
the datatypes each operation can be applied to. In addition, users may define
their own operations that can be overloaded to operate on several datatypes,
either basic or derived. This is further explained in the description of
the user-defined operations (see the man pages for <a href="../man3/MPI_Op_create.3.php">MPI_Op_create</a> and <a href="../man3/MPI_Op_free.3.php">MPI_Op_free</a>).
<p>
The operation op is always assumed to be associative. All predefined operations
are also assumed to be commutative. Users may define operations that are
assumed to be associative, but not commutative. The &lsquo;&lsquo;canonical&rsquo;&rsquo; evaluation
order of a reduction is determined by the ranks of the processes in the
group. However, the implementation can take advantage of associativity,
or associativity and commutativity, in order to change the order of evaluation.
This may change the result of the reduction for operations that are not
strictly associative and commutative, such as floating point addition.
 <p>
Predefined operators work only with the MPI types listed below (Predefined
Reduce Operations, and the section MINLOC and MAXLOC, below).  User-defined
operators may operate on general, derived datatypes. In this case, each
argument that the reduce operation is applied to is one element described
by such a datatype, which may contain several basic values. This is further
explained in Section 4.9.4 of the MPI Standard, "User-Defined Operations."

<p> The following predefined operations are supplied for MPI_Reduce_local
and related functions <a href="../man3/MPI_Allreduce.3.php">MPI_Allreduce</a>, <a href="../man3/MPI_Reduce_scatter.3.php">MPI_Reduce_scatter</a>, and <a href="../man3/MPI_Scan.3.php">MPI_Scan</a>. These
operations are invoked by placing the following in op: <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;Name                Meaning
     ---------           --------------------
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_MAX             maximum
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_MIN             minimum
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_SUM             sum
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_PROD            product
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_LAND            logical and
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_BAND            bit-wise and
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_LOR             logical or
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_BOR             bit-wise or
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_LXOR            logical xor
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_BXOR            bit-wise xor
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_MAXLOC          max value and location
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_MINLOC          min value and location
</pre><p>
The two operations MPI_MINLOC and MPI_MAXLOC are discussed separately below
(MINLOC and MAXLOC). For the other predefined operations, we enumerate below
the allowed combinations of op and datatype arguments. First, define groups
of MPI basic datatypes in the following way: <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;C integer:            MPI_INT, MPI_LONG, MPI_SHORT,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;                      MPI_UNSIGNED_SHORT, MPI_UNSIGNED,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;                      MPI_UNSIGNED_LONG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Fortran integer:      MPI_INTEGER
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Floating-point:       MPI_FLOAT, MPI_DOUBLE, MPI_REAL,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;                      MPI_DOUBLE_PRECISION, MPI_LONG_DOUBLE
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Logical:              MPI_LOGICAL
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Complex:              MPI_COMPLEX
<tt> </tt>&nbsp;<tt> </tt>&nbsp;Byte:                 MPI_BYTE
</pre><p>
Now, the valid datatypes for each option is specified below. <p>
<br>
<pre><tt> </tt>&nbsp;<tt> </tt>&nbsp;Op                      <tt> </tt>&nbsp;<tt> </tt>&nbsp;Allowed Types
     ----------------         ---------------------------
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_MAX, MPI_MIN<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;C integer, Fortran integer,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;floating-point
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_SUM, MPI_PROD <tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;C integer, Fortran integer,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;floating-point, complex
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_LAND, MPI_LOR,<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;C integer, logical
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_LXOR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_BAND, MPI_BOR,<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;C integer, Fortran integer, byte
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_BXOR
</pre><p>

<h2><a name='sect10' href='#toc10'>Minloc and Maxloc</a></h2>
The operator MPI_MINLOC is used to compute a global minimum
and also an index attached to the minimum value. MPI_MAXLOC similarly computes
a global maximum and index. One application of these is to compute a global
minimum (maximum) and the rank of the process containing this value.

<p> <p>
The operation that defines MPI_MAXLOC is  <p>
<br>
<pre>         ( u )    (  v )      ( w )
         (   )  o (    )   =  (   )
         ( i )    (  j )      ( k )
where
    w = max(u, v)
and
         ( i            if u &gt; v
         (
   k   = ( min(i, j)    if u = v
         (
         (  j           if u &lt; v)
MPI_MINLOC is defined similarly:
         ( u )    (  v )      ( w )
         (   )  o (    )   =  (   )
         ( i )    (  j )      ( k )
where
    w = min(u, v)
and
         ( i            if u &lt; v
         (
   k   = ( min(i, j)    if u = v
         (
         (  j           if u &gt; v)
</pre><p>

<p> Both operations are associative and commutative. Note that if MPI_MAXLOC
is applied to reduce a sequence of pairs (u(0), 0), (<i>u(1)</i>, 1),&nbsp;..., (u(n-1),
n-1), then the value returned is (u , r), where u= max(i) u(i) and r is
the index of the first global maximum in the sequence. Thus, if each process
supplies a value and its rank within the group, then a reduce operation
with op = MPI_MAXLOC will return the maximum value and the rank of the
first process with that value. Similarly, MPI_MINLOC can be used to return
a minimum and its index. More generally, MPI_MINLOC computes a lexicographic
minimum, where elements are ordered according to the first component of
each pair, and ties are resolved according to the second component. <p>
The
reduce operation is defined to operate on arguments that consist of a pair:
value and index. For both Fortran and C, types are provided to describe
the pair. The potentially mixed-type nature of such arguments is a problem
in Fortran. The problem is circumvented, for Fortran, by having the MPI-provided
type consist of a pair of the same type as value, and coercing the index
to this type also. In C, the MPI-provided pair type has distinct types and
the index is an int. <p>
In order to use MPI_MINLOC and MPI_MAXLOC in a reduce
operation, one must provide a datatype argument that represents a pair
(value and index). MPI provides nine such predefined datatypes. The operations
MPI_MAXLOC and MPI_MINLOC can be used with each of the following datatypes:
<p>
<br>
<pre>    Fortran:
    Name                     Description
    MPI_2REAL                pair of REALs
    MPI_2DOUBLE_PRECISION    pair of DOUBLE-PRECISION variables
    MPI_2INTEGER             pair of INTEGERs

    C: <tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;
    Name        <tt> </tt>&nbsp;<tt> </tt>&nbsp;    <tt> </tt>&nbsp;<tt> </tt>&nbsp;Description
    MPI_FLOAT_INT            float and int
    MPI_DOUBLE_INT           double and int
    MPI_LONG_INT             long and int
    MPI_2INT                 pair of ints
    MPI_SHORT_INT            short and int
    MPI_LONG_DOUBLE_INT      long double and int
</pre><p>
The data type MPI_2REAL is equivalent to: <br>
<pre>    <a href="../man3/MPI_Type_contiguous.3.php">MPI_TYPE_CONTIGUOUS</a>(2, MPI_REAL, MPI_2REAL)
</pre><p>
Similar statements apply for MPI_2INTEGER, MPI_2DOUBLE_PRECISION, and MPI_2INT.
<p>
The datatype MPI_FLOAT_INT is as if defined by the following sequence of
instructions. <p>
<br>
<pre>    type[0] = MPI_FLOAT
    type[1] = MPI_INT
    disp[0] = 0
    disp[1] = sizeof(float)
    block[0] = 1
    block[1] = 1
    <a href="../man3/MPI_Type_struct.3.php">MPI_TYPE_STRUCT</a>(2, block, disp, type, MPI_FLOAT_INT)
</pre><p>
Similar statements apply for MPI_LONG_INT and MPI_DOUBLE_INT.   <p>
All MPI
objects (e.g., MPI_Datatype, MPI_Comm) are of type INTEGER in Fortran.
<h2><a name='sect11' href='#toc11'>Notes
on Collective Operations</a></h2>

<p> The reduction operators ( <i>MPI_Op</i> ) do not return
an error value.  As a result, if the functions detect an error, all they
can do is either call  <i><a href="../man3/MPI_Abort.3.php">MPI_Abort</a></i> or silently skip the problem.  Thus, if
you change the error handler from <i>MPI_ERRORS_ARE_FATAL</i> to something else,
for example,  <i>MPI_ERRORS_RETURN</i> , then no error may be indicated.
<p> The reason
for this is the performance problems in ensuring that all collective routines
return the same error value.
<p>
<h2><a name='sect12' href='#toc12'>Errors</a></h2>
Almost all MPI routines return an error
value; C routines as the value of the function and Fortran routines in
the last argument. C++ functions do not return errors. If the default error
handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<h2><a name='sect13' href='#toc13'>See Also</a></h2>
<p>
<a href="../man3/MPI_Allreduce.3.php">MPI_Allreduce</a> <br>
<a href="../man3/MPI_Reduce.3.php">MPI_Reduce</a> <br>
<a href="../man3/MPI_Reduce_scatter.3.php">MPI_Reduce_scatter</a> <br>
<a href="../man3/MPI_Scan.3.php">MPI_Scan</a> <br>
<a href="../man3/MPI_Op_create.3.php">MPI_Op_create</a> <br>

<p><a href="../man3/MPI_Op_free.3.php">MPI_Op_free</a>
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
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Use of In-place Option</a></li>
<li><a name='toc9' href='#sect9'>Predefined Reduce Operations</a></li>
<li><a name='toc10' href='#sect10'>Minloc and Maxloc</a></li>
<li><a name='toc11' href='#sect11'>Notes on Collective Operations</a></li>
<li><a name='toc12' href='#sect12'>Errors</a></li>
<li><a name='toc13' href='#sect13'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
