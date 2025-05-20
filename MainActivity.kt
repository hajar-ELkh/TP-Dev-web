package com.example.businesscard

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.rounded.Email
import androidx.compose.material.icons.rounded.Phone
import androidx.compose.material.icons.rounded.Person
import androidx.compose.material3.*
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.draw.shadow
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.graphics.vector.ImageVector
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.businesscard.ui.theme.BusinessCardTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            BusinessCardTheme {
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    BusinessCard()
                }
            }
        }
    }
}

@Composable
fun BusinessCard() {
    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(
                brush = Brush.verticalGradient(
                    colors = listOf(
                        Color(0xFF1A1A2E),
                        Color(0xFF16213E),
                        Color(0xFF0F3460)
                    )
                )
            )
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(24.dp),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            // Carte principale avec ombre
            Card(
                modifier = Modifier
                    .fillMaxWidth()
                    .wrapContentHeight()
                    .shadow(
                        elevation = 20.dp,
                        shape = RoundedCornerShape(20.dp),
                        ambientColor = Color(0xFF533483).copy(alpha = 0.3f),
                        spotColor = Color(0xFF533483).copy(alpha = 0.3f)
                    ),
                shape = RoundedCornerShape(20.dp),
                colors = CardDefaults.cardColors(
                    containerColor = Color.White
                ),
                elevation = CardDefaults.cardElevation(
                    defaultElevation = 8.dp
                )
            ) {
                Column(
                    modifier = Modifier
                        .fillMaxWidth()
                        .padding(32.dp),
                    horizontalAlignment = Alignment.CenterHorizontally
                ) {
                    // Section 1: Avatar et informations principales
                    ProfileSection()

                    Spacer(modifier = Modifier.height(40.dp))

                    // Ligne de séparation élégante
                    Divider(
                        modifier = Modifier
                            .width(100.dp)
                            .height(2.dp)
                            .clip(RoundedCornerShape(1.dp)),
                        color = Color(0xFF533483).copy(alpha = 0.3f)
                    )

                    Spacer(modifier = Modifier.height(32.dp))

                    // Section 2: Informations de contact
                    ContactSection()
                }
            }
        }
    }
}

@Composable
fun ProfileSection() {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally
    ) {
        // Avatar avec gradient
        Box(
            modifier = Modifier
                .size(120.dp)
                .clip(CircleShape)
                .background(
                    brush = Brush.radialGradient(
                        colors = listOf(
                            Color(0xFF533483),
                            Color(0xFF3A1C71),
                            Color(0xFF1A1A2E)
                        )
                    )
                ),
            contentAlignment = Alignment.Center
        ) {
            // Initiales stylées
            Text(
                text = "HK",
                color = Color.White,
                fontSize = 36.sp,
                fontWeight = FontWeight.Bold
            )
        }

        Spacer(modifier = Modifier.height(24.dp))

        // Nom avec style moderne
        Text(
            text = "Hajar EL khouchali",
            fontSize = 28.sp,
            fontWeight = FontWeight.Bold,
            color = Color(0xFF1A1A2E),
            textAlign = TextAlign.Center
        )

        Spacer(modifier = Modifier.height(8.dp))

        // Titre professionnel avec badge
        Surface(
            modifier = Modifier.clip(RoundedCornerShape(20.dp)),
            color = Color(0xFF533483).copy(alpha = 0.1f)
        ) {
            Text(
                text = "Software & Data Engineer",
                fontSize = 16.sp,
                fontWeight = FontWeight.Medium,
                color = Color(0xFF533483),
                modifier = Modifier.padding(horizontal = 16.dp, vertical = 8.dp)
            )
        }
    }
}

@Composable
fun ContactSection() {
    Column(
        modifier = Modifier.fillMaxWidth(),
        verticalArrangement = Arrangement.spacedBy(16.dp)
    ) {
        ContactItem(
            icon = Icons.Rounded.Phone,
            text = "+212 638-539103",
            color = Color(0xFF1A1A2E)
        )

        ContactItem(
            icon = Icons.Rounded.Person,
            text = "LinkedIn: Hajar Elkhouchali",
            color = Color(0xFF1A1A2E)
        )

        ContactItem(
            icon = Icons.Rounded.Email,
            text = "elkhouchalihajar@gmail.com",
            color = Color(0xFF1A1A2E)
        )
    }
}

@Composable
fun ContactItem(
    icon: ImageVector,
    text: String,
    color: Color
) {
    Surface(
        modifier = Modifier
            .fillMaxWidth()
            .clip(RoundedCornerShape(12.dp)),
        color = Color(0xFFF8F9FA)
    ) {
        Row(
            modifier = Modifier
                .fillMaxWidth()
                .padding(16.dp),
            verticalAlignment = Alignment.CenterVertically
        ) {
            // Icône avec fond coloré
            Surface(
                modifier = Modifier
                    .size(40.dp)
                    .clip(CircleShape),
                color = Color(0xFF533483).copy(alpha = 0.1f)
            ) {
                Box(
                    contentAlignment = Alignment.Center,
                    modifier = Modifier.fillMaxSize()
                ) {
                    Icon(
                        imageVector = icon,
                        contentDescription = null,
                        tint = Color(0xFF533483),
                        modifier = Modifier.size(20.dp)
                    )
                }
            }

            Spacer(modifier = Modifier.width(16.dp))

            // Texte avec style moderne
            Text(
                text = text,
                fontSize = 16.sp,
                fontWeight = FontWeight.Medium,
                color = color,
                modifier = Modifier.weight(1f)
            )
        }
    }
}

@Preview(showBackground = true)
@Composable
fun BusinessCardPreview() {
    BusinessCardTheme {
        BusinessCard()
    }
}